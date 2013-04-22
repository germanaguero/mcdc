<?php
class Music
{
 // declare variables
	private $_mysql;
	private $_result;
	private $_query;


	public function __construct() {
		require_once("mysql_connect.php");
		$this->_mysql = new mysql();
		$this->_result = null;
		$this->_query = null;
	
	}
	
	public function getActiveAlbums(){
		$this->_query = "Select * from music where active = true";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getAlbum($id = false){
		if( is_numeric($id) ){
			
			$album = $this->gA($id);
			if($album){
				return $album;
			}
		}
		return false;
	}
	
	
	private function gA( $id ){
		$this->_query = "Select * from music where active = true and id = $id";
		$this->_result = $this->_mysql->query($this->_query);
			
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getHighlightedAlbums(){
		
		$highlighted_music = $this->gHA();

		if($highlighted_music){
			return $highlighted_music;
		}
		
		return false;

	}
	
	private function gHA(){
		$this->_query = "Select * from music where active = true and estreno_recomendado = true";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getNormalAlbums(){
	
			$normal_music = $this->gNA();

			if($normal_music){
				return $normal_music;
			}
		
		return false;

	}
	
	private function gNA(){
		$this->_query = "Select * from music where active = true and estreno_recomendado = false";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function searchAlbums($album){
		if( !is_null($album) && strlen(trim($album)) > 0 ){
			$normal_music = $this->sA($album);

			if($normal_music){
				return $normal_music;
			}
		}
		return false;

	}
	
	private function sA($album){
		//$this->_query = "Select * from music where album like'%".$album."%' and active = 1";
		//$this->_result = $this->_mysql->query($this->_query);
		//echo '<pre>'.print_r($this->_result, true).'</pre>';

		$words = explode(" ", $album);

		if( count($words) > 0 ){

			if( count($words) == 1 ){
				$this->_query = "Select * from music where album like'%".$words[0]."%' and active = 1";

			}
			else if(count($words) > 1){

				$this->_query = "Select * from music where album REGEXP '";

				for($i=0; $i < count($words); $i++){

					if($i == count($words)-1 ){
						$this->_query = $this->_query . $words[$i] . "'";
					}
					else{
						$this->_query = $this->_query . $words[$i] . "|";
					}

				}

			}

			$this->_result = $this->_mysql->query($this->_query);

			//echo '<pre>'.print_r($this->_result, true).'</pre>';
			
				if( count($this->_result) > 0 ){
					return $this->_result;
				}
		}

		return false;		
	}
}
?>