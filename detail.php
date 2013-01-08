<?php require_once("includes/head.php");?>

<body> 

<header>
<?php
require_once("includes/header.php");
require_once("controllers/".basename($_SERVER['PHP_SELF']));
?>

</header> 


<section> 


<?php if( $movie_detail ){
$movie_html_detail = "";

	foreach( $movie_detail as $key => $movie ){
		//echo '<pre>'.print_r($movie, true).'</pre>';
		
		$movie_html_detail .= "<div id=\"title\" class=\"title\">";
		$movie_html_detail .= $movie["title"];
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"screenshot_description\" class=\"screenshot_description\">";

			$movie_html_detail .= "<div id=\"screenshot\" class=\"screenshot\">";
			$movie_html_detail .= "<img src=\"".IMAGE_PATH_DETAIL.$movie["img"]."\" alt=\"img_movie_".$movie["id"]."\" />";
			$movie_html_detail .= "</div>";
			
			$movie_html_detail .= "<div id=\"description\" class=\"description\">";
			$movie_html_detail .= htmlentities($movie["description"], ENT_QUOTES, "ISO-8859-1");
			$movie_html_detail .= "</div>";


		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"rating_time_calificacion\" class=\"rating_time_calificacion\">";
				
				$movie_html_detail .= "<div id=\"rating\" class=\"rating\">";
				$movie_html_detail .= $movie["rating"];
				$movie_html_detail .= "</div>";
				
				$movie_html_detail .= "<div id=\"time\" class=\"time\">";
				$movie_html_detail .= $movie["duracion"]." minutos";
				$movie_html_detail .= "</div>";
				
				$movie_html_detail .= "<div id=\"calificacion\" class=\"calificacion\">";
				$movie_html_detail .= $movie["clasificacion"];
				$movie_html_detail .= "</div>";
				
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"ver_descargar\" class=\"ver_descargar\">";
		
		if( MODE_HREF_JAVASCRIPT ){
			$movie_html_detail .= "<a href=\"".$url_javascript."\" onclick=\"window.open(this.href); return false\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}else{
			$movie_html_detail .= "<a href=\"".BASE_PATH."online.php?id=".$movie["id"]."\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		};
		
		$movie_html_detail .= "</div>";
		
		/*
		$movie_html_detail .= "<div id=\"screenshot_description\" class=\"screenshot_description\">";
		
		$movie_html_detail .= "<div id=\"screen\" class=\"screenshot\">";
		$movie_html_detail .= "<img src=\"".IMAGE_PATH_DETAIL.$movie["img"]."\" alt=\"img_movie_".$movie["id"]."\" />";
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"description\" class=\"description\">";
		$movie_html_detail .= htmlentities($movie["description"], ENT_QUOTES, "ISO-8859-1");
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "</div>";
				
		$movie_html_detail .= "<div id=\"rating_time_calificacion\" class=\"rating_time_calificacion\">";
		
		$movie_html_detail .= "<div id=\"rating\" class=\"rating\">";
		$movie_html_detail .= $movie["rating"];
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"time\" class=\"time\">";
		$movie_html_detail .= $movie["duracion"]." Min";
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"calificacion\" class=\"calificacion\">";
		$movie_html_detail .= $movie["clasificacion"];
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "</div>";
		
		$movie_html_detail .= "<div id=\"ver_descargar\" class=\"ver_descargar\">";
		
		if( MODE_HREF_JAVASCRIPT ){
			$movie_html_detail .= "<a href=\"".$url_javascript."\" onclick=\"window.open(this.href); return false\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}else{
			$movie_html_detail .= "<a href=\"".BASE_PATH."online.php?id=".$movie["id"]."\"><img alt=\"play_movie_".$movie["id"]."\" src=\"".IMAGE_PATH_ICO."play-live-online_32.png\"></a>";
		}
		
		$movie_html_detail .= "</div>";	
		*/
	}
echo $movie_html_detail;
}
else{
	echo 'no movies enable';
}

?>

<!--
<div id="title" class="title">
titulo
</div>
<div id="screen" class="screenshot">
imagen 
</div>
<div id="description" class="description">
description
</div>
<div id="rating" class="rating">

</div>
<div id="time" class="time">
Duración
</div>
<div id="calificacion" class="calificacion">
Calificacion
</div>
<div id="" class="ver_descargar">
ver online / descargar
</div>
-->






</section> 

<footer>
<?php require_once("includes/aside.php");?>  
<?php require_once("includes/footer.php");?>  
</footer>

</body> 
</html> 

