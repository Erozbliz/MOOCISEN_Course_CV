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
	$requete_prepare = $bdd->prepare("SELECT * FROM user where email='$email'"); // on prépare notre req
	$requete_prepare->execute();
	$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
	//echo '--->'.$result[0]['email'];
	//echo '--->'.$result[0]['password'];
	var_dump($result);


	if (empty($result)) {
  		echo 'Aucun compte';
	}else if($result[0]['email']==$email && $result[0]['password']==$valPassword){
		session_start();
        $_SESSION['login'] = $_POST['email'];
      //  header('Location: ../mooc.php');
	}
	


	/*$requete = $bdd->prepare("SELECT count(*) FROM user WHERE email=:email AND password=:pass");
    $requete->bindParam(':email', $_POST['email']);
    $requete->bindParam(':pass', $valPassword);
    $requete->execute();
    
    $t = $requete->fetchAll(PDO::FETCH_NUM);
    var_dump($t);
    
    $requetePrepare = $bdd->prepare("SELECT grade FROM user WHERE email='$valMail'");
    $requetePrepare->execute();
    $tab = $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
    $verif=$tab[0]["grade"]; 
    echo "<br> $verif";*/
    
    /*if ($t[0][0] == "1" && $verif==1)
    {
        session_start();
        $_SESSION['Login'] = $_POST['Login'];
        header('Location: userProfile.php');
    }
    else if ($verif==0)
    {
         header ("location: index.php?erreur=Compte non activé");
    }
    else if ($t[0][0] == "0")
    {
        header ("location: index.php?erreur=Erreur de saisie");
    }
    else
    {
        header ("location: index.php?erreur=Echec de la connexion");
    }*/

 }




$verif = formValid();
if($verif==1){
	insertUsertoBDD();
}
else{
	echo '<br>wrong form';
}

?>