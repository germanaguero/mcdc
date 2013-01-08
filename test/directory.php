<?php
require_once( dirname((__FILE__))."\classes\music.php" );
require_once( dirname((__FILE__))."\includes\config.php" );

$id = $_GET["id"];

$result = new Music();

$album_detail = $result->getAlbum($id);

echo '<pre>'.print_r($album_detail, true).'</pre>';

if( $album_detail ){
$music_html_detail = "";

	$directory = dirname(__FILE__)."\\music\\".$album_detail[0]["album"];
    $filenames = array();
    $iterator = new DirectoryIterator($directory);
	
	echo '<pre>'.print_r($directory, true).'</pre>';
	echo '<pre>'.print_r($iterator, true).'</pre>';
	echo '<pre>album_detail'.print_r($album_detail, true).'</pre>';
	
    $file_list = array();
	$i = 0;
	
	$cover = "http://127.0.0.1:81/mecolguedelcable/music/".$album_detail[0]["album"]."/".$album_detail[0]["img_1"];
	$title = $album_detail[0]["album"];
	
	echo '<pre>cover'.print_r($cover, true).'</pre>';
	
	foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile()) {
            
			//$file_extension = $fileinfo->getExtension();
			$file_extension = pathinfo($fileinfo->getFilename(), PATHINFO_EXTENSION);
			$array_list = array();
			
			
			
			if( $file_extension == "mp3" ){
			
				
				$file_name = array();
				$file_name = substr($fileinfo->getFilename(), 0, -4);

				
				echo '<pre>file name'.print_r($file_name, true).'</pre>';
				
				$file_info["title"] = $title;
				
				
				$file_info["mp3"] = "http://127.0.0.1:81/mecolguedelcable/music/".$album_detail[0]["album"].'//'.$file_name.".mp3";
				
				
				$file_info["oga"] = "http://127.0.0.1:81/mecolguedelcable/music/".$album_detail[0]["album"].'/ogg/'.$file_name.".ogg";
				
				
				$file_info["poster"] = $cover;
				$array_list[] = $file_info;
			}
			
        }
		
    }
	$music_list = json_encode($array_list);
}
else{
	echo 'no music enable';
}



	



?>