<?php
session_start();
include "../_include/connect.inc.php";  /// Connection bdd

//ok=1   ko=0
function sessionValid(){
	$verif = 1;
	if ((isset($_SESSION['id_user'])) && (!empty($_SESSION['id_user'])))
    {
    	//session ok
    }
    else
    {
    	$verif = 0;
    }
    return $verif;
}

function insertLogtoBDD(){
 	include "../_include/connect.inc.php";


 	/* Récupération date est heure */
 	$date = date("d-m-Y");
	$heure = date("H:i");
	$connect_time = $date." ".$heure;

	/* Récupération session */
	if ((isset($_SESSION['id_user'])) && (!empty($_SESSION['id_user']))){
		$id_user = $_SESSION['id_user'];//ok
	}else{
		$id_user = 0;
	}
	if ((isset($_SESSION['email'])) && (!empty($_SESSION['email']))){
		$email = $_SESSION['email'];//ok
	}else{
		$email = 'unknow';
	}
	/* Récupération ip */
	$ip = $_SERVER["REMOTE_ADDR"];

	/* Récupération url */
	$autre = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
 	$bool = sessionValid();

 	if($bool == 0)
 	{
 		try { 
			$requete_prepare= $bdd->prepare("INSERT INTO log(connect_time,ip,autre) VALUES('$connect_time', '$ip', '$autre')"); // on prépare notre requête
			$requete_prepare->execute();
			echo "->OK sans session";
		} catch (Exception $e) { 
	  		echo $e->errorMessage();
	  		echo "->erreur";
		}
	}else{
		try { 
			$requete_prepare= $bdd->prepare("INSERT INTO log(id_user,connect_time,email,ip,autre) VALUES('$id_user', '$connect_time', '$email', '$ip', '$autre')"); // on prépare notre requête
			$requete_prepare->execute();
			echo "->OK avec session";
		} catch (Exception $e) { 
	  		echo $e->errorMessage();
	  		echo "->erreur";
		}
 	}
	
 }




	insertLogtoBDD();


?>