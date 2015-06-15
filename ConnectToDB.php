<?php
class ConnectToDB{
	private $_servername="localhost";
	private $_dbName="paragliding_user";
	private $_dbusername="Paragl1d1ng";
	private $_dbpassword="test.paragliding";
	public  $conn;

	function __construct($_servername, $_dbName, $_dbusername, $_dbpassword){
		$this->conn = mysqli_connect ( $this->_servername, $this->_dbName, $this->_dbusername, $this->_dbpassword);
	}
	public function sqlQuery($sql){	
		return mysqli_query($this->conn, $sql);
	}
	
	function __destruct() {
		if(mysqli_close ( $this->conn )){
			exit ("<br />conn closed");
		}
	}
}
