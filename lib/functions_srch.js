	$(document).ready(function(){
	$("#linkBtn").click(function(){
			$('#myDiv').slideToggle("slow");
		    $('#myDiv').css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFFFCC'});
			$('#data').css({"opacity": "0.85"});
			$("#data").delay(10).fadeIn("slow");
			});

		$("#linkBtn").mouseover(function(){
		$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
		$("#page_wrapper").css({'z-index' : '1000'});
		});
		
			
		$(function(){
			$("#query").live('keyup', function(){
				var data = 'query=' + $(this).val();
					
				$.post('http://localhost/movies_ci/lib/buscador_query.php', data, function(resp){
					$('#productos').empty();
					$('#tmpl_results').tmpl(resp).appendTo('#productos');
					}, 'json');
				});
			});	
	});
	

	function swapContent(cv){
		$('#myDiv').html("Loading.gif").show();
		var url = "http://localhost/movies_ci/lib/detalle.php";
		$.post(url, {idVar : cv }, function(data){
			$('#myDiv').html(data).show();
		});
	} 
	
	function reloadPage()
	   {
	   window.location.reload()
	   }