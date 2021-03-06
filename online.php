<?php
require_once("includes/head.php");
require_once("controllers/online.php");
?>
<body> 

<header>
<?php 
require_once("includes/header.php");

if( $movie_detail ){
$movie_html_detail = "";
/*
<source src="movie.webm" type='video/webm; codecs="vp8.0, vorbis"'/>
<source src="movie.ogg" type='video/ogg; codecs="theora, vorbis"'/>
<source src="movie.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'/>
*/
	foreach( $movie_detail as $key => $movie ){
		//echo '<pre>'.print_r($movie, true).'</pre>';
		if( $browser_codec == "h.264"){
			$movie_html_detail .= "<source src=\"".DIR_MOVIE.$movie["mp4"]."\" type='video/mp4'/>";
		}
		else if( $browser_codec == "theora" ){
			$movie_html_detail .= "<source src=\"".DIR_MOVIE.$movie["ogg"]."\" type=\"video/ogg\">";
			//$movie_html_detail .= "<source src=\"".DIR_MOVIE.$movie["ogg"]."\" type=\"video/webm\" >";
			//$movie_html_detail .= '<source src="/movie/Deadfall.2012.DVDRip.XViD-PLAYNOW.SUBTITULADO.webmhd.webm" type="video/webm"/>';
		}
		//$download_link = "get_file.php?id=".$movie["id"];
		$download_link = "getfile/".$movie["id"];
	}
}
else{
	$movie_html_detail =  'no movies enable';
}
//set tag video
if(DOWNLOAD_LINK){
	$tag_video = "<video controls>".
	  $movie_html_detail."
	</video>";
}
else{
	$tag_video = "<video controls autoplay>".
	  $movie_html_detail."
	</video>";
}

?>
</header> 

<section> 
<div id="video_box">
	<?php echo $tag_video; ?> 
</div>

<?php
	if(DOWNLOAD_LINK){
		echo "<div id=\"download_container\">
		<a href=\"/".$download_link."\" id=\"download_img_1\"><img src=\"".IMAGE_PATH_ICO."download_64x64.png\" alt=\"download_ico\" /></a>
		</div>";
	}
?>

</section> 

<footer>
<?php require_once("includes/footer.php");?>  
</footer>

</body> 
</html> 

