$(document).ready(function(){
	$("#linkBtn").click(function(){
			$('#myDiv').slideToggle("slow");
		    $('#myDiv').css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFFFCC'});
			$('#data').css({"opacity": "0.85"});
			$("#data").delay(200).fadeIn("slow");
			});

		$("#linkBtn").mouseover(function(){
		$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
		$("#page_wrapper").css({'z-index' : '1000'});
		});
		
		$('#log').mouseover(function(){
			$("#logo").css({'margin-left' : '406px'});
			$("#info").css({'margin-top' : '-100px'});
			});
	});

	nav = navigator.appName;

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

	function tooltip(cv){
	$('#log').html("Loading.gif").show();
	var url = "http://localhost/movies_ci/lib/tooltip.php";
	$.post(url, {idVar : cv }, function(data){
		$('#log').html(data).show();

	});
	}

	function swapContent(cv){
		$('#myDiv').html("Loading.gif").show();
		var url = "http://localhost/movies_ci/lib/detalle.php";
		$.post(url, {idVar : cv }, function(data){
			$('#myDiv').html(data).show();
		});
	}
	
	function eliminar(url)
	{
		if (confirm("Realmente desea eliminar este game ?"))
		{
			window.location=url;		
		}
	}


	alert("Estas utilizando "+ navigator.appName);