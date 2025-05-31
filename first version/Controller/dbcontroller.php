<?php
class DBController {
	// private $host = "68.178.143.67";
	// private $user = "Customer";
	// private $password = "Hover1@liven";
	// private $database = "Customer";

	//private $host = "localhost";
	//private $user = "root";
	//private $password = "123456";
	//private $database = "Customer";

	private $host = "localhost";
	private $user = "vhost129609";
	private $password = "1234@Nelly";
	private $database = "vhost129609";
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
		mysql_set_charset("utf8");
	   	mysql_query("SET NAMES 'utf8'");	
	   	mysql_query("SET CHARACTER SET utf8", $conn); 
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>