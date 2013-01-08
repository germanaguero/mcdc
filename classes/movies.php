<?php
class Movies
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
	
	public function getActiveMovies(){
		$this->_query = "Select * from movies where active = true";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getMovie($id = false){
		if( is_numeric($id) ){
			
			$movie = $this->gM($id);
			if($movie){
				return $movie;
			}
		}
		return false;
	}
	
	
	private function gM( $id ){
		$this->_query = "Select * from movies where active = true and id = $id";
		$this->_result = $this->_mysql->query($this->_query);
			
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getHighlightedMovies(){
		
		$highlighted_movie = $this->gHM();

		if($highlighted_movie){
			return $highlighted_movie;
		}
		
		return false;

	}
	
	private function gHM(){
		$this->_query = "Select * from movies where active = true and estreno_recomendado = true";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	public function getNormalMovies(){
	
			$normal_movie = $this->gNM();

			if($normal_movie){
				return $normal_movie;
			}
		
		return false;

	}
	
	private function gNM(){
		$this->_query = "Select * from movies where active = true and estreno_recomendado = false";
		$this->_result = $this->_mysql->query($this->_query);

		//echo '<pre>'.print_r($this->_result, true).'</pre>';
		
		if( count($this->_result) > 0 ){
			return $this->_result;
		}
		else{
			return false;
		}
		
	}
	
	
	
	
	
	

}
?>