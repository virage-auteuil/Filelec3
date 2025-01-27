<?php

	require_once("vue/vue_profil.php");

    if (isset($_SESSION['id_client'])){
		$leClient = null; 
		if (isset($_GET['action']) && isset($_GET['id_client'])){
			$action = $_GET['action']; 
			$id_client = $_GET['id_client']; 

			switch ($action){
				case "sup" : $unControleur->deleteClient($id_client); break;
			}
		}
	}

?>