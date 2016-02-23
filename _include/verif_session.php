
<?php


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



$verifSession = sessionValid();
if($verifSession == 1){

}else{
    header ("location: ../_model/logout?erreur=Erreur formulaire");
}


?>