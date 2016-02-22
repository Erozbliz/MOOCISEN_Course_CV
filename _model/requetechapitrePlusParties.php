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

?>