<?php
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );
require_once( dirname(dirname((__FILE__)))."\classes\movies.php" );

$id = $_GET["id"];

$result = new Movies();

$movie_detail = $result->getMovie($id);

if( $movie_detail ){

	foreach( $movie_detail as $key => $movie ){
		//echo '<pre>'.print_r($movie, true).'</pre>';
		
		$file_name = $movie["ogg"];
		$url_download = BASE_PATH.DIR_MOVIE.$file_name;
		$file_size =  filesize("movie/".$file_name);
	}
}
else{
	echo 'no movies enable';
}
?>
