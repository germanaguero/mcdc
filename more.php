<?php
require_once("includes/head.php");
require_once("controllers/".basename($_SERVER['PHP_SELF']));
/*
if($movies_list){

$movie_table_list = "<table>
<thead>
</thead>
<tbody>";
$i = 1;

$total_movies = count($movies_list);

foreach( $movies_list as $key => $movie ){
	
	//set img link to display
	$movie_detail_link = "<a href=\"detail.php?id=".$movie["id"]."\"><img src=\"".IMAGE_PATH_DETAIL.$movie["img"]."\" width=\"114\" height=\"217\" alt=\"img_movie_".$movie["id"]."\" /></a>";
	
	//set play link to display	
	if( MODE_HREF_JAVASCRIPT ){
			$movie_play_link = "<a href=\"".$url_javascript."\" onclick=\"window.open(this.href,_blank,toolbar=no,directories=no,menubar=no,status=no,scrollbars=no);\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}else{
			$movie_play_link = "<a href=\"".BASE_PATH."online.php?id=".$movie["id"]."\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}
		
	if (($i % 2) == 1){
		//es impar
		$movie_table_list .= "<tr><td>".$movie_detail_link."</td><td>".$movie_play_link."</td>";
		
		if( $i == $total_movies ){
			$movie_table_list .= "</tr>";
		}
	}
	if (($i % 2) == 0){ 
		//es par
		$movie_table_list .= "<td>".$movie_detail_link."</td><td>".$movie_play_link."</td></tr>";
	}
	
	$i++;
}

$movie_table_list .="</tbody></table>";


}
*/


if($movies_list){

$i = 1;
$total_movies = count($movies_list);
$html = "";
foreach( $movies_list as $key => $movie ){
	$html_table = "";
	//set img link to display
	$movie_detail_link = "<a href=\"detail.php?id=".$movie["id"]."\"><img src=\"".IMAGE_PATH_DETAIL.$movie["img"]."\" width=\"114\" height=\"217\" alt=\"img_movie_".$movie["id"]."\" /></a>";

	if( $browser_codec == "h.264"){
		$url_javascript = DIR_MOVIE.$movie["mp4"];
	}
	else if( $browser_codec == "theora" ){
		$url_javascript = DIR_MOVIE.$movie["ogg"];
	}
	
	//set play link to display	
	if( MODE_HREF_JAVASCRIPT ){
			$movie_play_link = "<a href=\"".$url_javascript."\" onclick=\"window.open(this.href,_blank,toolbar=no,directories=no,menubar=no,status=no,scrollbars=no);\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}else{
			$movie_play_link = "<a href=\"".BASE_PATH."online.php?id=".$movie["id"]."\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}

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
					<tr><td>".$movie_detail_link."</td><td>".$movie_play_link."</td></tr>
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

