<?php
	/**
	* 
	*/
	class BD
	{
		
		private $dbHost     = 'localhost';
		private $dbUsername = 'root';
		private $dbPassword = '';
		private $dbName     = 'angularjs';
		private $db;

		public function __construct()
		{
			if(!isset($this->db)){
            // Connect to the database
				try{
					$conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
					$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db = $conn;
				}catch(PDOException $e){
					die("Failed to connect with MySQL: " . $e->getMessage());
				}
			}
		}

		public function execute($sql){
			$query = $this->db->prepare($sql);
        	return $query->execute();
		}

		public function lastInsertId(){
			return $this->db->lastInsertId();
		}

		public function read($sql){
			$query = $this->db->prepare($sql);
        	$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>