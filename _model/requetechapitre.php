<?php

	function idParNumeroChapitre($idMooc,$bdd,$numeroChap)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();
		
		echo '<h3 class="name"> '.$lignesChap[$numeroChap]["nom"].' </h3>';
		
		$idChap = $lignesChap[$numeroChap]["id_chapitre"];
		
		return $idChap;
	}
?>