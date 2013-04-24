<?php 
require_once("controllers/".basename($_SERVER['PHP_SELF']));
require_once("includes/head.php");
?>

<body>

<header>
<?php require_once("includes/header.php");?>
</header> 


<section>
<!--<article>-->
<div id="movies">
	<div id="movies_title">
		<p>Movies</p>
	</div>
<?php 
if( $movies_list ){

	$movies_html_list = "";
	$movies_html_list .= "<div id=\"jMyCarousel\" class=\"jMyCarousel\">";
	$movies_html_list .= "<ul>";

	foreach( $movies_list as $key => $movie ){
		//echo '<pre>'.print_r($movie, true).'</pre>';
				
		$movies_html_list .= "<li><a href=\"detail/".$movie["id"]."\"><img src=\"".IMAGE_PATH_DETAIL.$movie["img"]."\" width=\"214\" height=\"317\" alt=\"img_movie_".$movie["id"]."\" /></a></li>";
		
		/*
		$movie["title"]
		$movie["description"]
		$movie["rating"]
		$movie["clasificacion"]
		$movie["duracion"]
		
		$movie["ogg"]
		$movie["mp4"]
		$movie["active"]*/
	}

	$movies_html_list .= "</ul>";
	$movies_html_list .= "</div>";
	$movies_html_list .= "<div id=\"more_movies_link\" class=\"sign_plus\" ><a href=\"moremovie\"><img src=\"".IMAGE_PATH_ICO."plus_sign_44x42.png\" alt=\"more_movies\" title=\"more_movies\"></a></div>";

}
else{
	$movies_html_list = 'no movies enable';
}

echo $movies_html_list;
?>
</div>
</section> 
<section> 
<div id="music">
	<div id="music_title">
		<p>Music</p>
	</div>
<?php 
if( $music_list ){

	$music_html_list = "";
	$music_html_list .= "<div class=\"jMyCarousel_music\">";
	$music_html_list .= "<ul>";

	foreach( $music_list as $key => $music ){
		//echo '<pre>'.print_r($movie, true).'</pre>';
				
		$music_html_list .= "<li><a href=\"music/".$music["id"]."\"><img src=\"".DIR_MUSIC.$music["album"].'/'.$music["img_1"]."\" width=\"225\" height=\"225\" alt=\"img_movie_".$music["id"]."\" /></a></li>";
	}

	$music_html_list .= "</ul>";
	$music_html_list .= "</div>";
	$music_html_list .= "<div id=\"more_music_link\" class=\"sign_plus\"><a href=\"moremusic\"><img src=\"".IMAGE_PATH_ICO."plus_sign_44x42.png\" alt=\"more_music\" title=\"more_music\"></a></div>";
	
	
}
else{
	$music_html_list = 'no movies enable';
}

echo $music_html_list;
?>
<!--</article>-->
</div>
</section> 

<footer>
<?php require_once("includes/footer.php");?>  
</footer>

<script type="text/javascript">
$(document).ready(function() {
	$(".jMyCarousel").jMyCarousel({
		visible: '100%'
	});	

	$(".jMyCarousel_music").jMyCarousel({
		visible: '100%'
	});

	$(".jMyCarousel").css("width","97%");
	$(".jMyCarousel_music").css("width","97%");
	$(".jMyCarousel_music").css("height","226px");

});
</script>

</body> 
</html> 

