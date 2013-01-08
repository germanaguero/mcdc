<?php
require_once( dirname(dirname((__FILE__)))."\classes\music.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );

//get movie list
$result = new Music();
$album_list = $result->getNormalAlbums();
?>
