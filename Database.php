<?php
class Database{
	public $host 	= DB_HOST;
	public $user 	= DB_USER;
	public $pass 	= DB_PASS;
	public $dbname  = DB_NAME;


	public $conn;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){

	$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

	if(!$this->conn){
		$this->error = "Connection fail".$this->conn->connect_error; 
	}

	}

	// selece 0r rear data
	public function selectData($data){
		$result = $this->conn->query($data) or die($this->conn->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}

	// insert or create data

	public function insertData($query){
		$insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
		
		if($insert_row){
			header("Location: index.php?msg=".urlencode('Data insert successfull'));
			exit();
		}else{
			die("Error :(".$this->conn->errno.")".$this->conn->error);
		}
	}	

		//update or set data
	public function update($query){
		$update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
		
		if($update_row){
			header("Location: index.php?msg=".urlencode('Data Update successfull'));
			exit();
		}else{
			die("Error :(".$this->conn->errno.")".$this->conn->error);
		}
	}
		//delete data
	public function delete($query){
		$delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
		
		if($delete_row){
			header("Location: index.php?msg=".urlencode('Data Delete successfull'));
			exit();
		}else{
			die("Error :(".$this->conn->errno.")".$this->conn->error);
		}
	}

}

