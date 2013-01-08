<?php
require_once( dirname(dirname((__FILE__)))."\classes\movies.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );
require_once("controllers/online.php");

$id = $_GET["id"];
$result = new Movies();
$movie_detail = $result->getMovie($id);


?>
