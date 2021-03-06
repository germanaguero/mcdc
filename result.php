<?php
require_once("includes/head.php");
require_once("controllers/".basename($_SERVER['PHP_SELF']));

	if( count($movies_list[0]) > 0 ){

		$i = 1;
		$html_movie = "";

		foreach( $movies_list as $key => $result ){
			$html_table = "";
			//set img link to display
			$result_detail_link = "<a href=\"../detail/".$result["id"]."\"><img src=\"".IMAGE_PATH_DETAIL.$result["img"]."\" width=\"114\" height=\"217\" alt=\"img_result_".$result["id"]."\" /></a>";
			
			if( $browser_codec == "h.264"){
				$url_javascript = DIR_MOVIE.$result["mp4"];
			}
			else if( $browser_codec == "theora" ){
				$url_javascript = DIR_MOVIE.$result["ogg"];
			}
			
			//set play link to display	
			if( MODE_HREF_JAVASCRIPT ){
					$result_play_link = "<a href=\"".$url_javascript."\" onclick=\"window.open(this.href); return false\"><img alt=\"play_result_".$result["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
				}else{
					$result_play_link = "<a href=\"".BASE_PATH."online/".$result["id"]."\"><img alt=\"play_result_".$result["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
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
							<tr style=\"height:25px;\"></tr>
							<tr><td>".$result_detail_link."</td></tr><tr><td style=\"text-align:center;\">".$result_play_link."</td></tr>
							</tbody></table>
							</div>";
							
			$html_movie .= $html_table;
			
		}

	}




	if( count($album_list[0]) > 0 ){

		$i = 1;

		$html_music = "";

		foreach( $album_list as $key => $result ){
			$html_table = "";
			//set img link to display
			$album_detail_link = "<img src=\"".DIR_MUSIC.$result["album"].'/'.$result["img_1"]."\" width=\"225\" height=\"225\" alt=\"img_movie_".$result["id"]."\" />";
			$album_play_link = "<a href=\"../music/".$result["id"]."\"><img alt=\"play_movie_".$result["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";

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
							<tr style=\"height:25px;\"></tr>
							<tr><td>".$album_detail_link."</td></tr><tr><td style=\"text-align:center;\">".$album_play_link."</td></tr>
							</tbody></table>
							</div>";
							
			$html_music .= $html_table;
			
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

<section>
	<div class="more_result_list">
		<?php 
		if( isset( $html_movie ) && strlen($html_movie) > 1 ){	
			echo $html_movie; 
		}
		?>
		

		<?php 
		
		if( isset( $html_music ) && strlen($html_music) > 1 ){	
			echo $html_music; 
		}
		?>



	</div>
</section>


<div id="browser_logos">
<footer>
<?php require_once("includes/aside.php");?>  
<?php require_once("includes/footer.php");?>  
</footer>
</div>

</body> 
</html>