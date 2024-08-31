<?php

class SQLConnection {
      private $servername = 'localhost:3307', $password = 'root' , $username = 'root' , $dbname = 'online_shop';
	  protected $conn ;
      public function __construct(){
			try {
				$this->conn = new PDO("mysql:host=$this->servername;dbname=online_shop",$this->username, $this->password);
			} catch (PDOEXCEPTION $e) {
				echo "Connection failed : ".$e->getMessage();
		}
		}   
}
?>