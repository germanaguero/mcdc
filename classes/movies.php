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
	
	
	public function searchMovies($title){
	//SELECT * FROM `movies` WHERE title REGEXP 'resident|2012|evil'

		if( !is_null($title) && strlen(trim($title)) > 0 ){
	
			$normal_movie = $this->sM($title);

			if($normal_movie){
				return $normal_movie;
			}
		
		}
		return false;

	}
	
	private function sM($title){

		//SELECT * FROM `movies` WHERE title REGEXP 'resident|2012|evil'
		//$this->_query = "Select * from movies where title like'%".$title."%'";

		$words = explode(" ", $title);

		if( count($words) > 0 ){

			

			if( count($words) == 1 ){
				$this->_query = "Select * from movies where title like'%".$words[0]."%' and active = 1";

			}
			else if(count($words) > 1){

				$this->_query = "Select * from movies where title REGEXP '";

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