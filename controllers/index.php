<?php
require_once( dirname(dirname((__FILE__)))."\classes\movies.php" );
require_once( dirname(dirname((__FILE__)))."\classes\music.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );

//get movie list
$result = new Movies();
//$movies_list = $result->getActiveMovies();
$movies_list = $result->getHighlightedMovies();
shuffle($movies_list);


//get music list
$result = new Music();
$music_list = $result->getHighlightedAlbums();
shuffle($music_list);


?>
