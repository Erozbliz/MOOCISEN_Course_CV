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

//Fonction qui genere une chaine aléatoire
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Met a jour l id pour le reset du mdp
function updateIdResetPwd(){
 	include "../_include/connect.inc.php";
 	$valEmail = $_POST['email'];
 	$valEmailMd5 = (generateRandomString(3).$valEmail);
	$valEmailMd5 = md5($valEmailMd5);
	var_dump($valEmailMd5);
	try { 
		$requete_prepare= $bdd->prepare("UPDATE user SET reset_password='$valEmailMd5' WHERE email='$valEmail'"); // on prépare notre requête
		$requete_prepare->execute();
		echo "->OK";
		
	} catch (Exception $e) { 
  		echo $e->errorMessage();
  		echo "->erreur";
	}
	return $valEmailMd5;
 }


function sendEmail($urlLink){
	// Check for empty fields
	if(empty($_POST['email']))
	{
		echo "Erreur pas de mail";
		return false;
	}
	$name = "MOOC Mot de passe";
	$email_address = "olivier.colombies@gmail.com";
	$urlLink = $urlLink;
	$message = "A Bientot";
	$email_address = '"$email_address"';
		
	// Create the email and send the message
	$to = "$email_address"; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "Website Contact :  $name";
	$email_body = "Voici votre le lien pour le nouveau mot de passe\n\n"."\n\nEmail: $email_address\n\nUrl: $urlLink\n\n$message";
	$headers = "From: stockage.harddrive@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";	
	//mail($to,$email_subject,$email_body,$headers);
	return true;		
}


$verifMail = emailExist();
$verif = formValid();
if($verifMail==0){
	echo '<br>Mail inconnu';
}else if($verif==1){
	$urlResetPwd=updateIdResetPwd();
	echo "<br>Url a envoyer = reset_password?id=".$urlResetPwd;
	sendEmail($urlResetPwd); // envoie de l'email
}
else{
	echo '<br>wrong form';
}

?>