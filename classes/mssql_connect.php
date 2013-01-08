<?php
//classe mssql_connect

class mssql{
 // declare variables
	private $_mssql_server;
	private	$_mssql_user;
	private	$_mssql_password;
	private	$_mssql_database;
	private $_mssql_connection;
	private $_query;
	private $_query_mssql_result;
	private $_sqlAssoc;

	public function __construct() {
		/*
		//------------Produccion-------------//	
		$this->_mssql_server = '192.168.0.7';
		$this->_mssql_user = 'btnetuser';
		$this->_mssql_password = 'JorgitoLore7';
		$this->_mssql_database = 'btnet';
		//------------Produccion-------------//
		*/
		
		//------------Desarrollo-------------//	
		$this->_mssql_server = '192.168.19.128';
		$this->_mssql_user = 'sa';
		$this->_mssql_password = 'a1';
		$this->_mssql_database = 'btnet';
		//------------Desarrollo-------------//
		
		$this->_mssql_connection = null;
		$this->_query = null;
		$this->_query_mssql_result = null;
		$this->_sqlAssoc = null;
	
	}
	
	private function connect(){
	
		// set mysql connection
		$this->_connection = mssql_connect( $this->_mssql_server, $this->_mssql_user, $this->_mssql_password) or die ('<br />Error to connect to MSSQL: '.mssql_get_last_message());
		// select database
		mssql_select_db( $this->_mssql_database ,$this->_connection) or die ('<br />Error to connect to MSSQL Database : '.mssql_get_last_message());
	
	}
	
	private function close(){
		mssql_close($this->_connection);
	}
	

	public function query($query = null, $sqlAssoc = null){
		
		$this->_query = $query;
		$this->_sqlAssoc = $sqlAssoc;
		$this->connect();
		$this->_query_mssql_result = mssql_query($this->_query, $this->_connection) or die('<br />Error to run query on MSSQL Database: '.$this->_query.'<br /> Error MSSQL: '.mssql_get_last_message());
		
		if(strpos($this->_query, "INSERT") !== false || strpos($this->_query, "UPDATE") !== false || strpos($this->_query, "DELETE") !== false ||
		strpos($this->_query, "DROP") !== false || strpos($this->_query, "CREATE") !== false){
			return $this->_query_mssql_result;
		}
		else{
			$rows = null;
			switch ($this->_sqlAssoc) {
				case 'MSSQL_ASSOC':
					while($row = mssql_fetch_array($this->_query_mssql_result, MSSQL_ASSOC)) {
							$rows[] = $row;
					}
					return $rows;
					break;
				
				case 'MSSQL_NUM':
					while($row = mssql_fetch_array($this->_query_mssql_result, MSSQL_NUM)) {
						$rows[] = $row;
					}
					return $rows;
					break;
				
				case 'MSSQL_BOTH':
					while($row = mssql_fetch_array($this->_query_mssql_result, MSSQL_BOTH)) {
						$rows[] = $row;
					}
					return $rows;
					break;
				
				default:
					while($row = mssql_fetch_array($this->_query_mssql_result, MSSQL_ASSOC)) {
						$rows[] = $row;
					}
					return $rows;

			}
		
		}
		
		$this->close();
	}
	
	function iid($table) {
		$query = "SELECT IDENT_CURRENT('$table') as newId";
		$rows = $this->query($query);
		$newId = $rows[0]["newId"];	
	
		return $newId;
	}

}

?>