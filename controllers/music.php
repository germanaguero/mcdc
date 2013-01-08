<?php
require_once( dirname(dirname((__FILE__)))."\classes\music.php" );
require_once( dirname(dirname((__FILE__)))."\includes\config.php" );

$id = $_GET["id"];

$result = new Music();

$album_detail = $result->getAlbum($id);

//echo '<pre>'.print_r($album_detail, true).'</pre>';

if( $album_detail ){
$music_html_detail = "";

	$directory = dirname(dirname(__FILE__))."\\music\\".$album_detail[0]["album"];
    $filenames = array();
    $iterator = new DirectoryIterator($directory);
	
	// echo '<pre>'.print_r($directory, true).'</pre>';
	// echo '<pre>'.print_r($iterator, true).'</pre>';
	//echo '<pre>album_detail'.print_r($album_detail, true).'</pre>';
	
    $file_list = array();
	$i = 0;
	
	//$cover = "http://127.0.0.1:81/mecolguedelcable/music/".$album_detail[0]["album"]."/".$album_detail[0]["img_1"];
	$cover = DIR_MUSIC.$album_detail[0]["album"]."/".$album_detail[0]["img_1"];
	$title = $album_detail[0]["album"];
	
	//echo '<pre>cover'.print_r($cover, true).'</pre>';
	$array_list = array();
	foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile()) {
            
			//$file_extension = $fileinfo->getExtension();
			$file_extension = pathinfo($fileinfo->getFilename(), PATHINFO_EXTENSION);
			
			if( $file_extension == "mp3" ){
			
				$file_name = substr($fileinfo->getFilename(), 0, -4);

				//echo '<pre>file name'.print_r($file_name, true).'</pre>';
				
				$file_info = array();
				$file_info["title"] = $file_name;
				if($browser_codec == "h.264"){
					$file_info["mp3"] = DIR_MUSIC.$album_detail[0]["album"].'//'.$file_name.".mp3";
				}
				else if($browser_codec == "theora"){
					$file_info["oga"] = DIR_MUSIC.$album_detail[0]["album"].'/ogg/'.$file_name.".ogg";
				}
				$file_info["poster"] = $cover;
				
				//echo '<pre>file_info'.print_r($file_info, true).'</pre>';

				array_push($array_list, $file_info);
			}
			
        }
    }
	
	//echo '<pre>file name'.print_r($array_list, true).'</pre>';
	
	$music_list = json_encode($array_list);
}
else{
	$music_list = 'no music enable';
}



	



?>