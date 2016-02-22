<?php

	function chapitresplusSousPartie($idMooc,$bdd)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();

		if(sizeof($lignesChap) == 0){
		echo 'Aucun chapitre présent';
		}
		else
		{
			for($i = 0; $i<sizeof($lignesChap); $i++)
		    {
				echo '<li><a>'.$lignesChap[$i]["nom"].'<br></a>';
				$partie = $lignesChap[$i]["partie"];
				$tabPartie = array();
				$tabPartie = preg_split('[-]', $partie);
					//var_dump($lignesExo);
					 echo' <ul>';
							for($ipart = 0; $ipart < sizeof($tabPartie) ; $ipart++)
							{
								echo '<li><a href="">'.$tabPartie[$ipart].'</a></li>';
							}
					echo'</ul></li>';
		    }	
		}
	}
	
	function idParNumeroChapitre($idMooc,$bdd,$numeroChap)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();
		
		if(sizeof($lignesChap) != 0 && $numeroChap<sizeof($lignesChap))
		{
			echo '<h3 class="name"> '.$lignesChap[$numeroChap]["nom"].' </h3>';
			
			$idChap = $lignesChap[$numeroChap]["id_chapitre"];
		
			return $idChap;
		}
		else
		{
			echo 'Aucun chapitre présent';
			return -1;
		}
	}
	
	function idParNumeroExo($idMooc,$idChap,$bdd,$numeroExo)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();
		
		$selectExo = $bdd->prepare("SELECT * FROM exercice WHERE id_chapitre = $idChap");
		$selectExo->execute();
		
		$lignesExo = $selectExo->fetchAll();
		if(sizeof($lignesExo) != 0 && $numeroExo<sizeof($lignesExo))
		{
			echo'<div>
					<h3 class="name"> Exercice n°'.$lignesExo[$numeroExo]["numero"].' </h3>
				</div>';
			
			$idExo = $lignesExo[$numeroExo]["id_exercice"];
			
			if(sizeof($lignesExo) != 0)
			{	
				return $idExo;
			}
		}
		else
		{
			echo 'Aucun exercice présent';
			return -1;
		}
	}

?>