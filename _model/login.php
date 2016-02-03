<?php
include "../_include/connect.inc.php";  /// Connection bdd

echo "login.php";

//ok=1   ko=0
function formValid(){
	$verif = 1;
	if (isset($_POST['email'])) {
 		echo $_POST['email'];
	 }else{
	 	$verif=0;
	 }
	 if (isset($_POST['password'])) {
	 	echo $_POST['password'];
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
 	include "../_include/connect.inc.php";
 	$email = $_POST['email'];
	$valPassword = $_POST['password'];
	$valPassword = md5($valPassword);
	try { 
	$requete_prepare = $bdd->prepare("SELECT * FROM user WHERE email='$email'"); // on prépare notre req
	$requete_prepare->execute();
	$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
	} catch (Exception $e) { 
		echo $e->errorMessage();
  		echo "->erreur";
	}
	/*echo '--->'.$result[0]['email'];
	echo '--->'.$valPassword;
	var_dump($result);*/


	if (empty($result)) {
  		header ("location: ../inscription1?erreur=Aucun compte");
	}else if($result[0]['email']==$email && $result[0]['password']==$valPassword){
		session_start();
        $_SESSION['login'] = $_POST['email'];
      	header('Location: ../index');
	}else if($result[0]['email']==$email && $result[0]['password']!=$valPassword){
		header ("location: ../inscription1?erreur=Mot de passe faux");
	}else{
		header ("location: ../inscription1?erreur=Erreur de saisie");
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