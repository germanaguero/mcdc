<?php
require_once( dirname(dirname((__FILE__)))."\classes\music.php" );
require_once( dirname(dirname((__FILE__)))."\classes\movies.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );

$title = $_GET["title"];

//get music list
$albums = new Music();
$album_list = $albums->searchAlbums($title);

//get movie list
$movies = new Movies();
$movies_list = $movies->searchMovies($title);

/*
$result_list = array();
$result_list = $array_marge = array($movies_list, $album_list);
*/


//echo '<pre>'.print_r($movies_list, true).'</pre>';
//echo '<pre>'.print_r($album_list, true).'</pre>';
?>
