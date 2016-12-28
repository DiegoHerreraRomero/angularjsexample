<?php
	/**
	* 
	*/

	require_once("../entity/clUser.php");
	require_once("../bd/BD.php");

	
	class DaoUser
	{
		private $bd;
		private $user;
		private $date;


		public function __construct()
		{
			$this->bd = new BD();
			$this->user = new User();
			
		}

		public function create($user){
			try {
				$sql = sprintf("INSERT INTO users(name,email,phone,created) VALUES('%s','%s',%s,'%s')",
					mysql_real_escape_string($user->getName()),
					mysql_real_escape_string($user->getEmail()),
					mysql_real_escape_string($user->getPhone()),
					$user->getCreated());
				if($this->bd->execute($sql)){
					$user->setId($this->bd->lastInsertId());
					return $user;
				}else{
					return null;
				}
			} catch (Exception $e) {
				return null;
			}
		}

		public function update($user){
			try {
				$sql = sprintf("UPDATE users SET name='%s', email='%s', phone=%s, modified='%s' WHERE id = %s",
					mysql_real_escape_string($user->getName()),
					mysql_real_escape_string($user->getEmail()),
					mysql_real_escape_string($user->getPhone()),
					$user->getModified(),
					$user->getId());
				if($this->bd->execute($sql)){
					return $user;
				}else{
					return null;
				}
			} catch (Exception $e) {
				return null;
			}
		}

		public function delete($user){
			try {
				$sql = sprintf("DELETE FROM users WHERE id = %s",
				$user->getId());
				return $this->bd->execute($sql);
			} catch (Exception $e) {
				return false;
			}
		}

		public function readAll(){
			try {
				$sql = "SELECT * FROM users WHERE status = 1";
				return $this->bd->read($sql);
			} catch (Exception $e) {
				return null;
			}
		}
	}

	?>