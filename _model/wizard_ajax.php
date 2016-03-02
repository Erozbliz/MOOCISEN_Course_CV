<?php
include "connect.inc.php";  /// Connection bdd
$meschoix=$_POST["dataForm"]; //Mes choix
$solutions=$_POST["dataForm2"]; //Les solutions
$idm=$_POST["dataidm"]; //id mooc
$idc=$_POST["dataidc"]; //id chap
$ide=$_POST["dataide"]; //id exo

/*
$meschoix='["Monsieur Jeson Dupont","Jean Nicolas"]';
$solutions='["Olivier Garnier,Olivier SCHULTZ,Victor Gerard,PERRICHON Guillaume",""]';
*/
//var_dump($saisie);
$meschoix=str_replace('"',"",$meschoix);
$solutions=str_replace('"',"",$solutions);
$solutions=str_replace(',]',"]",$solutions);



//echo 'wizard ajax';
//echo 'wizard_ajax.php';
//$callback = $meschoix."<br>".$solutions;
//echo $callback;
//echo json_encode($callback);

if($meschoix == $solutions){
	echo 'CORRECT <br> les réponses sont :'.$solutions."<br>info : ".$idm." ".$idc." ".$ide;
}else{
	echo 'INCORRECT <br> les réponses sont :'.$solutions."<br>| ".$idm." ".$idc." ".$ide;
}
exit();
?>