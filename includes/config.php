<?php
//server name
$server_request = $_SERVER['SERVER_NAME'];
//server address
$server_addr = $_SERVER['SERVER_ADDR'];

//browser detect
$user_agent = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
if (preg_match('/MSIE/i', $user_agent)) { 
	$browser_codec = "h.264";   
}else if(preg_match('/Firefox/i', $user_agent)){
	$browser_codec = "theora";
}else if(preg_match('/Chrome/i', $user_agent)){
	$browser_codec = "theora";
}else if(preg_match('/Safari/i', $user_agent)){
	$browser_codec = "h.264";  
}else if(preg_match('/Opera/i', $user_agent)){
	$browser_codec = "theora";
}else if(preg_match('/Android/i', $user_agent)){
	$browser_codec = "h.264";
}

switch ($server_request){

    case "localhost":
    case "127.0.0.1":
		//define("BASE_PATH", "http://".$server_request.":81/mcdc/");
		define("BASE_PATH", "http://".$server_request."/");
        define("IMAGE_PATH","images/");
        define("IMAGE_PATH_DETAIL","images/detail/");
        define("IMAGE_PATH_ICO", "images/ico/");
        define("DIR_MOVIE", "movie/");
		define("DIR_MOVIE_DOWNLOAD", "C:\\xampp\\htdocs\\public\\mcdc\\movie\\");
        define("DIR_MUSIC", "music/");
        define("DIR_JS", "js/");
        define("DIR_CSS", "css/");
        define("DIR_INCLUDES", "includes/");
		define("DOWNLOAD_LINK", true);
		define("MODE_HREF_JAVASCRIPT", false);
   break;
    case "192.168.0.185":
    case "192.168.0.188":
	case "residentevil":
		define("BASE_PATH", "http://".$server_request.":81/mcdc/");
		define("IMAGE_PATH","images/");
        define("IMAGE_PATH_DETAIL","images/detail/");
        define("IMAGE_PATH_ICO", "images/ico/");
        define("DIR_MOVIE", "movie/");
		define("DIR_MOVIE_DOWNLOAD", "C:\\xampp\\htdocs\\public\\mcdc\\movie\\");
        define("DIR_MUSIC", "music/");
        define("DIR_JS", "js/");
        define("DIR_CSS", "css/");
        define("DIR_INCLUDES", "includes/");
		define("DOWNLOAD_LINK", false);
        define("MODE_HREF_JAVASCRIPT", false);
   break;

   case "90.0.4.143": //urdi
   case "192.168.3.101": //urdi
   case "192.168.3.100": //urdi
   /*
		define("BASE_PATH", "http://".$server_request."/");
        define("IMAGE_PATH","http://".$server_request."/images/");
        define("IMAGE_PATH_DETAIL","http://".$server_request."/images/detail/");
        define("IMAGE_PATH_ICO", "http://".$server_request."/images/ico/");
        define("DIR_MOVIE", "http://".$server_request."/movie/");
        define("DIR_MUSIC", "http://".$server_request."/music/");
        define("DIR_JS", "http://".$server_request."/js/");
        define("DIR_CSS", "http://".$server_request."/css/");
        define("DIR_INCLUDES", "http://".$server_request."/includes/");
		*/
		define("BASE_PATH", "http://".$server_request."/");
        define("IMAGE_PATH","images/");
        define("IMAGE_PATH_DETAIL","images/detail/");
        define("IMAGE_PATH_ICO", "images/ico/");
        define("DIR_MOVIE", "movie/");
        define("DIR_MUSIC", "music/");
        define("DIR_JS", "js/");
        define("DIR_CSS", "css/");
        define("DIR_INCLUDES", "includes/");
        define("DOWNLOAD_LINK", false);
		define("MODE_HREF_JAVASCRIPT", false);
		
   break;

    case "gerdev.no-ip.org":
		define("BASE_PATH", "http://".$server_request."/");
        define("IMAGE_PATH","images/");
        define("IMAGE_PATH_DETAIL","images/detail/");
        define("IMAGE_PATH_ICO", "images/ico/");
        define("DIR_MOVIE", "movie/");
        define("DIR_MUSIC", "music/");
        define("DIR_JS", "js/");
        define("DIR_CSS", "css/");
        define("DIR_INCLUDES", "includes/");
		define("DOWNLOAD_LINK", true);
		define("MODE_HREF_JAVASCRIPT", false);
   break;

}



?>
