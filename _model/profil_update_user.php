<?php
include "../_include/connect.inc.php";  /// Connection bdd

/*
	Modification du mot de passe depuis la page profif.php 
*/

//ok=1   ko=0
function formValid(){
	$verif = 1;
	if (isset($_POST['surname'])) {
 		echo $_POST['surname'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['name'])) {
	 	echo $_POST['name'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['pseudo'])) {
	 	echo $_POST['pseudo'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['email'])) {
	 	echo $_POST['email'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['selectPays'])) {
	 	echo $_POST['selectPays'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['idUser'])) {
	 	echo $_POST['idUser'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['selectJob'])) {
	 	echo $_POST['selectJob'];
	 }else{
	 	$verif=0;
	 }

	if($verif==0){
		return 0;
	}else{
		return 1;
	}
}


//Met a jour l id pour le reset du mdp
function updateUser(){
 	include "../_include/connect.inc.php";
 	$id = $_POST['idUser'];
 	$name = $_POST['name'];
 	$surname = $_POST['surname'];
 	$pseudo = $_POST['pseudo'];
 	$pays = $_POST['selectPays'];
 	$email = $_POST['email'];
 	$selectJob = $_POST['selectJob'];
	try { 
		$requete_prepare= $bdd->prepare("UPDATE user SET nom='$name', prenom='$surname', pseudo='$pseudo', email='$email', pays='$pays', statut='$selectJob' WHERE id_user='$id'"); // on prépare notre requête
		$requete_prepare->execute();
		echo "->OK user update";
	} catch (Exception $e) { 
  		echo $e->errorMessage();
  		echo "->erreur";
	}
 }



//Valide que le formulaire
$verif = formValid();

if($verif==1){
	updateUser();
}
else{
	echo '<br>wrong form';
}


?>