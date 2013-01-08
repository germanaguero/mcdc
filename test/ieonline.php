<?php
require_once("includes/head.php");
require_once("controllers/online.php");
?>
<body> 

<header>
<?php require_once("includes/header.php");?>
</header> 

<section> 
<!--
<video id=home_video class="video-js vjs-default-skin" controls preload=none width=640 height=264>
            <source src="Shreks.mp4" type='video/mp4'/>
  <track kind=captions src="/video-js/captions.vtt" srclang=en label=English />
</video>
-->


<video id=home_video class="video-js vjs-default-skin" controls preload=none width=640 height=264 poster="http://video-js.zencoder.com/oceans-clip.jpg">
  <source src="Shreks.mp4" type='video/mp4'/>
  <track kind=captions src="/video-js/captions.vtt" srclang=en label=English />
</video>

<script>var homePlayer=_V_("home_video");</script>
  
<!--
<video autoplay="autoplay" controls="controls">
<source src="Formularios.mp4" type='video/mp4'>
</video>
-->
</section> 

<aside>
<?php require_once("includes/aside.php");?>  
</aside>

<footer>
<?php require_once("includes/footer.php");?>  
</footer>

</body> 
</html> 

