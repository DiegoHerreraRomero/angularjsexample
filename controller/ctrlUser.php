<?php

if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
	require_once("../dao/daoUser.php");
	require_once("../entity/clUser.php");
	date_default_timezone_set('America/Santiago');
	$date = date('Y-m-d H:i:s');
	$dao = new DaoUser();
	$data;
	try {
		switch($_REQUEST['type']){
			case "list":
				$list = $dao->readAll();
				if($list != null){
					$data["users"] = $list;
					$data["status"] = "OK";
				}else{
					$data["users"] = array();
					$data["status"] = "ERROR";
				}
				break;
			case "create":
				$user = new User();
				$user->setName($_POST['data']['name']);
				$user->setEmail($_POST['data']['email']);
				$user->setPhone($_POST['data']['phone']);
				$user->setCreated($date);
				if($dao->create($user) != null){
					$data['data']=$user->toArray();
					$data["message"]="Usuario agregado";
					$data["status"]="OK";
				}else{
					$data["message"]="Error al agregar";
					$data["status"]="ERROR";
				}
				break;
			case "update":
				$user = new User();
				$user->setId($_POST['data']['id']);
				$user->setName($_POST['data']['name']);
				$user->setEmail($_POST['data']['email']);
				$user->setPhone($_POST['data']['phone']);
				$user->setModified($date);
				if($dao->update($user) != null){
					$data['data']=$user->toArray();
					$data["message"]="Usuario actualizado";
					$data["status"]="OK";
				}else{
					$data["message"]="Error al modificar";
					$data["status"]="ERROR";
				}
				break;
			case "delete":
				$user = new User();
				$user->setId($_POST['extra']['id']);
				if($dao->delete($user)){
					$data["message"]="Usuario eliminado";
					$data["status"]="OK";
				}else{
					$data["message"]="Error al eliminar";
					$data["status"]="ERROR";
				}
				break;
		}
	} catch (Exception $e) {
		$data["message"]="Error del sistema";
		$data["status"]="ERROR";
	}

	echo json_encode($data);
}
?>