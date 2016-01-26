<?php
include "connect.inc.php";  /// Connection bdd

echo "incription.php";
 if (isset($_POST['surname'])) {
 	echo $_POST['surname'];
 }
 if (isset($_POST['name'])) {
 	echo $_POST['name'];
 }
 if (isset($_POST['pseudo'])) {
 	echo $_POST['pseudo'];
 }
 if (isset($_POST['email'])) {
 	echo $_POST['email'];
 }
 if (isset($_POST['password'])) {
 	echo $_POST['password'];
 	echo "-->".md5($_POST['password']);
 }
 if (isset($_POST['selectPays'])) {
 	echo $_POST['selectPays'];
 }


 function insertUsertoBDD(){
 	include "connect.inc.php";
 	$valSurname = $_POST['surname'];
	$valName = $_POST['name'];
	$valPseudo = $_POST['pseudo'];
	$valEmail = $_POST['email'];
	$valPassword = md5($_POST['password']);
	$valPays = $_POST['selectPays'];
	try { 
		$requete_prepare= $dmysql->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,ville,grade) VALUES('$valSurname', '$valName', '$valPseudo', '$valEmail', '$valPassword', '$valPays', 1)"); // on prépare notre requête
		$requete_prepare->execute();
		echo "->OK";
	} catch (Exception $e) { 
  		echo $e->errorMessage();
  		echo "->erreur";
	}
 }

 insertUsertoBDD();

?>