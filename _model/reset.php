<?php
include "../_include/connect.inc.php";  /// Connection bdd

echo "incription.php";

//ok=1   ko=0
function formValid(){
	$verif = 1;
	if (isset($_POST['email'])) {
 		echo $_POST['email'];
	 }else{
	 	$verif=0;
	 }
	
	if($verif==0){
		return 0;
	}else{
		return 1;
	}
}

//Evite d'avoir 2 mail identique en bdd ok=1 ko=0
function emailExist(){
	include "../_include/connect.inc.php";
	$verif = 1; //existant par defaut
	$email = $_POST['email'];
	try { 
	$requete_prepare = $bdd->prepare("SELECT * FROM user where email='$email'"); // on prépare notre req
	$requete_prepare->execute();
	$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
	} catch (Exception $e) { 
		echo $e->errorMessage();
  		echo "->erreur";
	}

	if (empty($result)){
		$verif = 0;
	}
	return $verif;
}



function insertUsertoBDD(){
 	include "../_include/connect.inc.php";
	$valEmail = $_POST['email'];
	try { 
		$requete_prepare= $bdd->prepare("INSERT INTO user(reset_password) VALUES('$valEmail')"); // on prépare notre requête
		$requete_prepare->execute();
		echo "->OK";
	} catch (Exception $e) { 
  		echo $e->errorMessage();
  		echo "->erreur";
	}
 }

$verifMail = emailExist();
$verif = formValid();
if($verifMail==1){
	echo '<br>Mail déjà present';
}else if($verif==1){
	insertUsertoBDD();
}
else{
	echo '<br>wrong form';
}

?>