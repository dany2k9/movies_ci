<?php
class Movies_model extends CI_Model {
	
	function display($name, $limit, $offset)
	{
		$q = $this->db->select('titulo, plot, img, img_thumb, id_movie')
			->from($name)
			->limit($limit, $offset)
            ->order_by('titulo');
			
		$ret['rows'] = $q->get()->result();
		
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from($name);
		
		$tmp = $q->get()->result();
		
		$ret['num_rows'] = $tmp[0]->count;
		
		return $ret;	
	}
	
	function check_user($name, $pass)
	{
		
		$q = $this->db->select('nombre, password')
		->from('movies_users')
		->where('nombre', $name, 'password', $pass)->get()->result();
		
		return $q;
	}
	
	function add_user($name, $pass)
	{
		$new_user_insert_data = array(
			'nombre' => $name,
			'password' => md5($pass)
		);
		
		//ingresa el nuevo usuario en la bd
		$insert = $this->db->insert('movies_users', $new_user_insert_data);
		
		//$res2 = mysql_query($new_table, Conectar::con());
		return $insert;
	}
	
	function add_table($name)
	{
		$new_table = "CREATE TABLE ".$name." (
		  id_movie int(11) NOT NULL AUTO_INCREMENT,
		  titulo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
		  plot text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
		  duracion varchar(50) NOT NULL,
		  director varchar(100) NOT NULL DEFAULT '',
		  elenco varchar(255) NOT NULL DEFAULT '',
		  genero varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
		  yea varchar(50) NOT NULL,
		  rank varchar(50) NOT NULL,
		  img varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
		  img_thumb varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
		  PRIMARY KEY (id_movie)
		) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;";

		$insert = $this->db->query($new_table, $name);
		return $insert;
	}
	
	function added($username)
	{
		$img =$this->input->post('ima');
		echo "name: ".$img;
		$ima_clean = explode('com/', $img);
	
		$temp = $img;
		$nombre_foto = $username."_".$ima_clean[1];
		copy($temp, $username."_images/".$nombre_foto);
		
		//thumbnails
		$moveResult = copy($img, $username."_images/thumbs/".$nombre_foto);
		
		$kaboom = explode(".", $nombre_foto); // Divide el nombre del archivo en un array en funcion del punto
		$fileExt = end($kaboom);
		
		
		include_once APPPATH.'/libraries/ak_php_img_lib_1.0.php';
		$target_file = $username."_images/thumbs/".$nombre_foto;
		$resized_file = $username."_images/thumbs/resized_".$nombre_foto;
		$wmax = 280;
		$hmax = 250;
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		unlink($target_file);
		
		
	
		$this->db->insert($username, array(
        'titulo' => $this->input->post('tit'),
        'plot' => $this->input->post('plot'),
		'duracion' => $this->input->post('length'),
		'director' => $this->input->post('dir'),
		'elenco' => $this->input->post('cast'),
		'genero' => $this->input->post('genre'),
		'yea' => $this->input->post('year'),
		'rank' =>  $this->input->post('rank'),
		'img' => $username.'_images/'.$nombre_foto,
		'img_thumb' => $resized_file
      )); 
	}
	
	function details($name, $id)
	{
		$q = $this->db->get_where($name, array('id_movie' => $id));
			
		$ret['rows'] = $q->result();
		
		return $ret;	
	}

}