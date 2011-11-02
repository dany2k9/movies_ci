<?php
class Movies extends CI_Controller
{
    
    
	function __construct()
	{
    parent::__construct();
	/* $this->load->helper('download');
    $this->load->helper('directory');
	$this->load->library('ftp'); */
	}
	
	function index()
	{
		$this->load->view('index');
	}

	function display($offset = 0)
	{
		$limit = 25;

		$this->load->model('Movies_model');
		
		$name = $this->input->post('login');
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if(!isset($is_logged_in) || $is_logged_in != TRUE)
		{
			//echo "Debe loguearse";
			echo "<script type='text/javascript'>
			alert('Debe loguearse');
			</script>";
			
			echo anchor('movies/index', 'Volver');
			die();
		}else
		{
		$results = $this->Movies_model->display($username, $limit, $offset);
		
		$data['datos'] = $results['rows'];
		$data['total'] = $results['num_rows'];
		$data['username'] = $this->session->userdata('username');
		
		//$this->input->load_query($query_id);
		
		$this->load->library('pagination');
		/* $this->load->library('table');
		
		$this->table->set_heading('Id', 'The title', 'Author', 'The comment'); */
		
		//$data['query_id'] = $query_id;
		
		$config['base_url'] = site_url('movies/display');
		$config['total_rows'] = $this->db->get($username)->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		/* $config['full_tag_open'] = '<div id ="pagination">';
		$config['full_tag_close'] = '</div>'; */
		
		$this->pagination->initialize($config);
		
		/* $data['records'] = $this->db->get($username, $config['per_page'], $this->uri->segment(3));
		 */
		//$this->load->view('site_view', $data);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('movies', $data);

		}
		
	}
	
	function add()
	{
		$elements = array();
		
		print_r($_POST);
		
		include_once APPPATH.'/libraries/simple_html_dom.php';
		$nom = $this->input->post('nom');
		
		$user = $this->input->post('id');
		
		$html = file_get_html('http://www.filmaffinity.com/es/advsearch.php?stext='.$nom.'&stype[]=title&genre=&country=&fromyear=&toyear=');
		
		foreach($html->find("table tr td table tr td table tr td table tr td table tr td b a") as $element) 
		{
			$links['link'] = $element->href; 
			$links['text'] = $element->plaintext; 	
			$elements[] = $links;		
		}
		$tot2 = sizeof($elements);
		
		//echo $tot2;
		
		
			/* for($i = 0; $i < $tot2; $i++)
			{
			
			echo "<a href='http://localhost/movies/movie_data.php?mid=".$elements[$i]['link'] . "&id=''>".$elements[$i]['text']."</a><br>";
			
			} */
			
		$query_array = array(
			'movies' => $elements,
			'category' => $tot2,
			'user_id' => $user
		);
		
		
		$this->load->view('add', $query_array);
		
	}
	
	function logueo()
	{
		$this->load->model('Movies_model');
	
		$name = $this->input->post('login');
		
		$pass = $this->input->post('pass');
		
		$exist = $this->Movies_model->check_user($name, $pass);
		
		
		
		if($exist)
		{
			$data_log = array(
				'username' => $this->input->post('login'),
				'is_logged_in' => true
				
			);
			$this->session->set_userdata($data_log);
			//site apunta a un controlador
			redirect('movies/display');
		
			//$this->display();
		}
		else
		{
			redirect('movies/index');
			//$this->index();
		}
	}
	
	function new_user()
	{
		$this->load->view('new_user');
	}
	
	function add_user()
	{
		$base_url = base_url();
		
		$this->load->model('Movies_model');
	
		$name = $this->input->post('login');
		
		$pass = $this->input->post('pass');
		
		$exist = $this->Movies_model->check_user($name, $pass);
		
		$this->load->library('form_validation');
		
		if($exist)
		{
			$this->new_user();
		}
		else
		{
		$this->form_validation->set_rules('login', 'Nombre', 'trim|required|min_length[3]|max_length[8]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[5]|max_length[18]');
		$this->form_validation->set_message('required', 'El campo %s es Requerido');
		$this->form_validation->set_message('max_length', 'El campo %s solo puede tener 8 caracteres');
		$this->form_validation->set_message('min_length', 'El campo %s debe  tener al menos 5 caracteres');
		
		if($this->form_validation->run() == TRUE)
			{
			$add = $this->Movies_model->add_user($name, $pass);
			$add2 = $this->Movies_model->add_table($name);
				if($add AND $add2)
				{
					mkdir(FCPATH . '' .$name.'_images', 0777, true);
					mkdir(FCPATH . '' .$name.'_images/thumbs', 0777, true);
					redirect('movies/index');
				}else
				{
					$this->new_user();
				}
			}else
			{
				$this->new_user();
			}
		}
		
		
	}
	
	function add_movie()
	{
		//print_r($_POST);
		//print_r($_GET);
		$link['mid'] = $this->input->get('mid');
		$link['user'] =  $this->session->userdata('username');
		//$link['id'] = $this->input->post('id');
		$this->load->view('movie_data', $link);
	}
	
	function added()
	{
		$username = $this->session->userdata('username');
		$this->load->model('Movies_model');
		
		$data = array(
			'tit' => $this->input->post('tit'),
			'plot' => $this->input->post('plot'),
			'length' => $this->input->post('length'),
			'dir' => $this->input->post('dir'),
			'cast' => $this->input->post('cast'),
			'genre' => $this->input->post('genre'),
			'year' => $this->input->post('year'),
			'rank' => $this->input->post('rank'),
			'ima' => $this->input->post('ima')
		);
		
		$this->Movies_model->added($username);
		
		//echo $data['tit'];
	}
	
	function search()
	{
		redirect(base_url().'lib/buscador.php');
	}
	
	function logout()
	{
		//$this->session->unset('is_logged_in');
		$this->session->sess_destroy();
		redirect('movies/index');
	}
	
	function details()
	{
		//echo "details";
		//print_r($_POST);
		$titulo_movie = $this->input->post('titulo_movie'); 
		$tit = $this->input->post('titulo');
		$id = $this->input->post('id_movie');
		//echo $titulo_movie;
		
		$username = $this->session->userdata('username');
		
		$this->load->model('Movies_model');
		
		$results = $this->Movies_model->details($username,$id);
		
		$data['datos'] = $results['rows'];
		
		//$this->load->view('detalle', $data);
	}
	
	function edit()
	{
		//print_r($_GET);
		$test = $this->input->post('title1');
		echo $test;
		echo "edit";
	}
}  