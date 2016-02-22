<?php

	include '../../_include/connect.inc.php';
	function chapitres($id)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();

		if(sizeof($lignesChap) == 0){
		echo 'Aucun chapitre présent';
		}
		else
		{
			echo 'ok';
		}
	}

?>