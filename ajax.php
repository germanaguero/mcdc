<?php 
require_once("classes/movies.php");
require_once("classes/music.php");

if($_POST){
	$title = $_POST["title"];
}
else{
	$title = $_GET["title"];
}


$movie = new Movies();
$music = new Music();

if( $movie->searchMovies($title) || $music->searchAlbums($title) ){
	echo "1";
}
else{
	echo "0";
}



?>