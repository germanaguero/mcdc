<?php
require_once( dirname(dirname((__FILE__)))."\classes\movies.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );

$id = $_GET["id"];
$result = new Movies();
$movie_detail = $result->getMovie($id);

//get javascript url
if( $movie_detail ){
$movie_html_detail = "";
	foreach( $movie_detail as $key => $movie ){
		if( $browser_codec == "h.264"){
			$url_javascript = DIR_MOVIE.$movie["mp4"];
		}
		else if( $browser_codec == "theora" ){
			$url_javascript = DIR_MOVIE.$movie["ogg"];
		}
	}
}

?>
