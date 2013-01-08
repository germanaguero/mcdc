<?php
require_once("classes/mysql_connect.php");
$result = new mysql();
$query = "SELECT * FROM `movies`";
//run query
$query_mysql_result = $result->query($query);
echo '//////////////////Resultados test de conexión (Utilizando clase mysql_connect.php)////////////////////////////////////';
echo '<br />//----------Base de datos MYSQL <strong> btnet_dbo </strong><br />';
echo '<br />//----------Rows devueltas en la consulta <strong>'.count($query_mysql_result).'</strong><br />';
echo '<br />//----------Resultados de la query a la tabla <strong> movies </strong><br />';

echo '<pre>';
print_r($query_mysql_result);
echo '</pre>';


?>