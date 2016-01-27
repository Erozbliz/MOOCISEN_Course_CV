<?php
include "_include/connect.inc.php";  /// Connection bdd

echo "incription.php";

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
	 if (isset($_POST['password'])) {
	 	echo $_POST['password'];
	 	echo "-->".md5($_POST['password']);
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['selectPays'])) {
	 	echo $_POST['selectPays'];
	 }else{
	 	$verif=0;
	 }

	if($verif==0){
		return 0;
	}else{
		return 1;
	}
}



 function insertUsertoBDD(){
 	include "_include/connect.inc.php";
 	$valSurname = $_POST['surname'];
	$valName = $_POST['name'];
	$valPseudo = $_POST['pseudo'];
	$valEmail = $_POST['email'];
	$valPassword = md5($_POST['password']);
	$valPays = $_POST['selectPays'];
	$valJob = $_POST['selectJob'];
	try { 
		$requete_prepare= $bdd->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,ville,grade) VALUES('$valSurname', '$valName', '$valPseudo', '$valEmail', '$valPassword', '$valPays', 1)"); // on prépare notre requête
		$requete_prepare->execute();
		echo "->OK";
	} catch (Exception $e) { 
  		echo $e->errorMessage();
  		echo "->erreur";
	}
 }

$verif = formValid();
if($verif==1){
	insertUsertoBDD();
}
else{
	echo '<br>wrong form';
}

?>