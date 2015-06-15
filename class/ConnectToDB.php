<?php
class ConnectToDB{
	private $_servername="localhost";
	private $_dbusername;
	private $_dbpassword;
	private $_dbName="test.paragliding";
	public  $conn;
	
	
	function __construct($_servername, $_dbusername, $_dbpassword, $_dbName){
		$this->getConfigData();
		$this->conn = mysqli_connect ( $this->_servername, $this->_dbusername, $this->_dbpassword, $this->_dbName);
	}
	protected function getConfigData(){
		$str = file_get_contents('config.ini');
		$arr = explode("::::", $str);
		$this->_dbusername = $arr[0];
		$this->_dbpassword = $arr[1];
	}
	 
	public function sqlQuery($sql){	
		return mysqli_query($this->conn, $sql);
	}
	
	function __destruct() {
		return mysqli_close ( $this->conn );
	}
}
