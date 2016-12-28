<?php
	/**
	* 
	*/
	class User
	{

		private $id;
		private $name;
		private $email;
		private $phone;
		private $created;
		private $modified;
		private $status;
		
		public function __construct()
		{
			# code...
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getCreated(){
			return $this->created;
		}

		public function setCreated($created){
			$this->created = $created;
		}

		public function getModified(){
			return $this->modified;
		}

		public function setModified($modified){
			$this->modified = $modified;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}

		public function toArray(){
			return array(
				'id' => $this->id,
				'name' => $this->name,
				'email' => $this->email,
				'phone' => $this->phone,
				'created' => $this->created,
				'modified' => $this->modified,
				'status' => $this->status
			);
		}

	}
?>