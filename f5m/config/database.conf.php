<?php 
namespace fun5i\manager\config;

use PDO;
use PDOException;

class DatabaseConfig {

	private $host = '127.0.0.1';
	private $db_name = "fun5i_manager";
	private $username = 'root';
	private $password = 'password';
	private $conn;

	private $msg;
	private $error;

	public function __construct() {

		$this->conn = null;
		$this->error = false;
		$this->msg = "success";

		try {
			$this->conn = new PDO('mysql:host='. $this->host . ';dbname='. $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){ 
			$this->msg = "Error : ".$e;
			$this->error = true;

		}
	}

	public function connect(){
		return $this->conn;
	}

	public function getError(){
		return $this->error;
	}

	public function getMessage(){
		return $this->msg;
	}
}

?>