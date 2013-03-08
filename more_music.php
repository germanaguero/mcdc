<?php
require_once("includes/head.php");
require_once("controllers/".basename($_SERVER['PHP_SELF']));

if($album_list){

$i = 1;
$total_movies = count($album_list);
$html = "";
foreach( $album_list as $key => $album ){
	$html_table = "";
	//set img link to display
	$album_detail_link = "<img src=\"".DIR_MUSIC.$album["album"].'/'.$album["img_1"]."\" width=\"225\" height=\"225\" alt=\"img_movie_".$album["id"]."\" />";
	$album_play_link = "<a href=\"music/".$album["id"]."\"><img alt=\"play_movie_".$album["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
	
	if (($i % 2) == 1){
		//es impar
		$div_class = "table_left";
	}
	
	if (($i % 2) == 0){ 
		//es par
		$div_class = "table_right";
	}

	$html_table .= "<div class=".$div_class.">
					<table>
					<thead>
					</thead>
					<tbody>
					<tr><td>".$album_detail_link."</td><td>".$album_play_link."</td></tr>
					</tbody></table>
					</div>";
	
	
	$html .= $html_table;
	
	$i++;
}


}



?>
<body> 
<style type="text/css">
/*table{ border-collapse: collapse;}*/
/*tr, td{ border: 1px #ccc solid; HEIGHT:100%; }*/
div.table_left{float:left; padding-left: 100px; padding-top:10px; }
div.table_right{float:left; padding-left: 100px; padding-top:10px; }
</style>

<header>
<?php 
	require_once("includes/header.php");
?>
</header> 

<div id="more_movie_list">
<section>
	<?php echo $html; ?>
</section> 
</div>

<div id="browser_logos">
<footer>
<?php require_once("includes/aside.php");?>  
<?php require_once("includes/footer.php");?>  
</footer>
</div>

</body> 
</html> 

