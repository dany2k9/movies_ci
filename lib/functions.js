$(document).ready(function(){
	/* $("#linkBtn").click(function(){
			$('#myDiv').slideToggle("slow");
		    $('#myDiv').css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFFFCC'});
			$('#data').css({"opacity": "0.85"});
			$("#data").delay(200).fadeIn("slow");
			}); */

/* 		$("#linkBtn").mouseover(function(){
		$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
		$("#page_wrapper").css({'z-index' : '1000'});
		});
		
		$('#log').mouseover(function(){
			$("#logo").css({'margin-left' : '406px'});
			$("#info").css({'margin-top' : '-100px'});
			}); */
		
		/*$("#24").click(function(){
			var id_movie_val = $('#24').val();
			
			$.post(base_url + "movies/details", { id_movie_val: id_movie_val}, function(data){
			alert(data);
		}, "json");
		
		return false;
			
		});	*/
		$('#titleDiscs').click(function(){
		$('#discarea').show('slow');
	});
        function view_discs(value){
        $('#discarea').change(function(){

				if( $(this).val() != 'SeleccioneD')
				{

					var value = $(this).val();
					$.post('movies/display',{ discarea : value},function(data_disc){
						$('#discs1').html("<h3 class='titleDetails'>Disco: " + value + "</h3>" + data_disc).show();
						$('#discs1').delay(500).fadeIn("fast");
						$('#data2').css({"opacity": "0.85"});
						$("#data2").delay(200).fadeIn("slow");
					});
				}
				$(this).hide('fast');
				$(this).val('SeleccioneD');
        });
        }

        $("#discs1").click(function(){
			$(this).delay(200).fadeOut("fast");
			$("#data2").delay(200).fadeOut("fast");
		});


        $('#span1').mouseover(function(){
            var x = -36;
            var y = -56;
            var ancho = $(this).height();
            var alto = $(this).width();
            $('#data').offset({top : posy/2 + 25, left : posx/2 + 25});
            //$('#data').attr({'readonly': 'readonly'});
            $('#data').css({'visibility' :'visible', 'z-index' : 3000});
            $(this).css('z-index','1000');
            
        })

        $('#data').mouseout(function(){
           $(this).css({'visibility' :'hidden'});
        });

        $('#span1').mouseout(function(){
            // $('#data').css({'visibility' :'hidden'});
            //$('#data').offset({top : 0, left : 0});
        });
        $('#page_wrapper').mouseover(function(){
            $('#data').css({'visibility' :'hidden'});

        })
        

});

	nav = navigator.appName;

    //testeando tooltip para firefox
    var posx = 0;
    var posy = 0;
    function getMouseXY(e) // works on IE6,FF,Moz,Opera7
    {

    if (!e) var e = window.event;
    if (e.pageX || e.pageY)
    {
        posx = e.pageX/2;
        posy = e.pageY/2;
    }
    else if (e.clientX || e.clientY)
    {
        posx = e.clientX/2;
        posy = e.clientY/2;
    }
    document.getElementById('data').innerHTML = 'Mouse position is: X='+posx+' Y='+posy;

    }
    //testeando tooltip para firefox



	function pos(id, elem){
			if(nav=='Microsoft Internet Explorer' || nav=='Netscape')
			{
				x=$(id).offset();
				curleft = x.left + 18;
				curtop = x.top - 370;
				$(elem).offset({top : curtop, left : curleft});
				$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
			}
			if(nav=='Opera')
			{
				x=$(id).offset();
				curleft = x.left + 18;
				curtop = x.top - 135;
				$(elem).offset({top : curtop, left : curleft});
				$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
			}
		}

   /*	function tooltip(cv){
	$('#log').html("http://localhost/movies_ci/lib/Loading.gif").show();
	var url = "http://localhost/movies_ci/lib/tooltip.php";
	$.post(url, {idVar : cv }, function(data){
		$('#log').html(data).show();

	});
    } */

    function tooltip(cv){
	$('#log').html("<img src='http://localhost/movies_ci/lib/Loading.gif' />").show();
		$.ajax({
			type: "GET",
			url: 'http://localhost/movies_ci/lib/tooltip.php?idVar=' + cv,
			cache: true,
			success: function(result) {
			  $('#log').html(result).show();
			},
			error: function(result) {
			alert("Ha ocurrido un error, por favor intentelo mas tarde");
			}
		})
	}

	/*function swapContent(cv, user1){
		$('#myDiv').html("Loading.gif").show();
		var url = "http://localhost/movies_ci/lib/detalle.php";
		$.post(url, {idVar : cv, user: user1}, function(data){
			$('#myDiv').html(data).show();
		});
	}*/

    function swapContent(cv, user1){
	$('#myDiv').html("<img src='http://localhost/movies_ci/lib/Loading.gif' />").show();
		$.ajax({
		type: "GET",
		url: 'http://localhost/movies_ci/lib/detalle.php?idVar=' + cv + "&user=" + user1,
		cache: true,
		success: function(result) {
		  $('#myDiv').html(result).show();
		},
		error: function(result) {
		alert("Ha ocurrido un error, por favor intentelo mas tarde");
			}
		})
	}
	
	function eliminar(url)
	{
		if (confirm("Realmente desea eliminar este game ?"))
		{
			window.location=url;		
		}
	}

/*function checkS(e){
// capture the mouse position
    var posx = 0;
    var posy = 0;
    if (!e) var e = window.event;
    if (e.pageX || e.pageY)
    {
        posx = e.pageX;
        posy = e.pageY;
    }
    else if (e.clientX || e.clientY)
    {
        posx = e.clientX;
        posy = e.clientY;
    }
document.getElementById('pos').innerHTML = 'Mouse position is: X='+posx+' Y='+posy;
}*/


	//alert("Estas utilizando "+ navigator.appName);