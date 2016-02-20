<?php

	function chapitre($idMooc)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();
		$lignesChap = $selectChap->fetchAll();
		
		
	}

?>