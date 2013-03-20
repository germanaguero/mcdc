function trim (string){
	return string.replace(/^\s+/g,'').replace(/\s+$/g,'')
}

function clearSearchBoxInput(){
	var search_text;
	search_text = document.getElementById('searchBoxInput').value;
		
	if(search_text == "Nombre de Pelicula o Disco"){
		document.getElementById('searchBoxInput').value = "";
	}
}

function search(){
	var search_text;
	search_text = document.getElementById('searchBoxInput').value;
	//queryRequestGet(search_text);
	queryRequestPost(search_text);
}

function createObjectAjax(){
	var http_ajax = new XMLHttpRequest();
	return http_ajax;
}

function queryRequestGet(search_text){
	var http_request = createObjectAjax();
	
	http_request.onreadystatechange = function(){
		if(http_request.readyState == 4)
		{
		  handleResponse(http_request.responseText);
		}
	}
	
	http_request.open("GET", "ajax.php?title="+search_text, true); 
	http_request.send(null);
}

function handleResponse(response)
{

	console.log(response);

  
	if(response == 0){
		document.getElementById('response_ajax').innerHTML = "no hay resultados para la busqueda";
	}
	else{
		window.location="more_movies.php";
	}
}

function queryRequestPost(search_text){
	var http_request = createObjectAjax();
	
	http_request.onreadystatechange = function(){
		if(http_request.readyState == 4)
		{
		  handleResponse(http_request.responseText);
		}
	}
	
	http_request.open("POST", "ajax.php", true);
	http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http_request.send("title="+search_text);
}




