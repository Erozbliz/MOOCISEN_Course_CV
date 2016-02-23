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
			
			 echo'
			 
			 <div class="form-group">
				<h2 class="StepTitle center">'.$lignesQcm[$iQcm]["question"].'</h2><br>
					';
							for($itab = 0; $itab < sizeof($tab) ; $itab++)
							{
								echo '<div class="checkbox center">
										<label class="hover">
											<div class="icheckbox_flat-green checked hover" style="position: relative;"><input type="checkbox" class="flat"  style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
											'.$tab[$itab].'<br>
										</label>
									</div>';
							}
			echo' </div>';
			
			return true;
		}
	}

?>