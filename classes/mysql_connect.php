<?php
//classe mysql_connect

class mysql{
 // declare variables
	private $_mysql_server;
	private	$_mysql_user;
	private	$_mysql_password;
	private	$_mysql_database;
	private $_mysql_connection;
	private $_query;
	private $_query_mysql_result;
	private $_sqlAssoc;

	public function __construct() {
	
		$this->_mysql_server = 'localhost';
		$this->_mysql_user = 'root';
		$this->_mysql_password = 'ger154530man';
		$this->_mysql_database = 'mcdc';
		$this->_mysql_connection = null;
		$this->_query = null;
		$this->_query_mysql_result = null;
		$this->_sqlAssoc = null;
	
	}
	
	private function connect( ){
	
		// set mysql connection
		$this->_connection = mysql_connect( $this->_mysql_server, $this->_mysql_user, $this->_mysql_password) or die ('<br />Error to connect to MYSQL: '.mysql_error());
		// select database
		mysql_select_db( $this->_mysql_database ,$this->_connection) or die ('<br />Error to connect to MYSQL Database : '.mysql_error());
	
	}
	
	private function close(){
		mssql_close($this->_connection);
	}

	public function query($query = null, $sqlAssoc = null ){
		
		$this->_query = $query;
		$this->_sqlAssoc = $sqlAssoc;
		$this->connect();
		$this->_query_mysql_result = mysql_query($this->_query, $this->_connection) or die('<br />Error to run query on MYSQL Database: '.$this->_query.'<br /> Error Mysql: '.mysql_error());
		
		if(strpos($this->_query, "INSERT") !== false || strpos($this->_query, "UPDATE") !== false || strpos($this->_query, "DELETE") !== false ||
		strpos($this->_query, "DROP") !== false || strpos($this->_query, "CREATE") !== false){
			return $this->_query_mysql_result;
		}
		else{
			$rows = null;
			switch ($this->_sqlAssoc) {
				case 'MYSQL_ASSOC':
					while($row = mysql_fetch_array($this->_query_mysql_result, MYSQL_ASSOC)) {
							$rows[] = $row;
					}
					return $rows;
					break;
				
				case 'MYSQL_NUM':
					while($row = mysql_fetch_array($this->_query_mysql_result, MYSQL_NUM)) {
						$rows[] = $row;
					}
					return $rows;
					break;
				
				case 'MYSQL_BOTH':
					while($row = mysql_fetch_array($this->_query_mysql_result, MYSQL_BOTH)) {
						$rows[] = $row;
					}
					return $rows;
					break;
				
				default:
					while($row = mysql_fetch_array($this->_query_mysql_result, MYSQL_ASSOC)) {
						$rows[] = $row;
					}
					
					return $rows;

			}
		
		}
		$this->close();
	}

}

?>