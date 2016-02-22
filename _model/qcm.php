<?php

	function ExoQcm($idMooc,$idChap,$idExo,$bdd,$numeroExo)
	{
		$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
		$selectChap->execute();

		$lignesChap = $selectChap->fetchAll();
		
		$selectExo = $bdd->prepare("SELECT * FROM exercice WHERE id_chapitre = $idChap");
		$selectExo->execute();
		
		$lignesExo = $selectExo->fetchAll();
		$idQcmOk = $lignesExo[$numeroExo]["id_qcm"];
		$idDragOk = $lignesExo[$numeroExo]["id_drag"];
		if($idQcmOk != NULL && $idDragOk == NULL)
		{
			$iQcm = 0;
			$selectqcm = $bdd->prepare("SELECT * FROM qcm WHERE id_exercice = $idExo");
			$selectqcm->execute();

			$lignesQcm = $selectqcm->fetchAll();
			$reponse = $lignesQcm[$iQcm]["reponse"];
			$tab = array();
			$tab = preg_split('[-]', $reponse);
			//var_dump($lignesExo);
			 echo'<div class="content">
					<div class="main">
						<P class="name"> '.$lignesQcm[$iQcm]["question"].' </p> <label>';
					for($itab = 0; $itab < sizeof($tab) ; $itab++)
					{
						echo '<input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">
						'.$tab[$itab].'<br>';
					}
						echo'</label>
					</div>
				</div>';
			
		}
		else
		{
			echo 'Aucun exercice présent';
			return -1;
		}
	}

?>