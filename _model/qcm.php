<?php

	function exoQcm($idMooc,$idChap,$idExo,$bdd,$numeroExo)
	{
		try{
			$selectChap = $bdd->prepare("SELECT * FROM chapitre WHERE id_mooc = $idMooc");
			$selectChap->execute();

			$lignesChap = $selectChap->fetchAll();
			
			$selectExo = $bdd->prepare("SELECT * FROM exercice WHERE id_chapitre = $idChap");
			$selectExo->execute();
			
			$lignesExo = $selectExo->fetchAll();
			
			$i = 0;
			$selectqcm = $bdd->prepare("SELECT * FROM qcm WHERE id_exercice = $idExo");
			$selectqcm->execute();
			
			$lignesQcm = $selectqcm->fetchAll();

			//Reponse du qcm
			$tabHint = array();
			$tabSolution = array();
			for($i = 0; $i < sizeof($lignesQcm) ; $i++)
			{
				$solution = $lignesQcm[$i]["solution"];
				$tabHint = preg_split('[-]', $solution);
				for($itab = 0; $itab < sizeof($tabHint) ; $itab++)
				{
					$tabSolution[$itab]=$tabHint[$itab];
				}
			}

			//Type hidden qui correpond au reponse pour le qcm
			$tabSolution=implode(",",$tabSolution);
			//$tabSolution=json_encode($tabSolution);
			//echo 'tab réponse='.$tabSolution;
			//Réponse présent
			echo "<input type='hidden' id='soluce' name='zyx' value='".$tabSolution."'/>";


			//affichage du QCM
			for($i = 0; $i < sizeof($lignesQcm) ; $i++)
			{
				$reponse = $lignesQcm[$i]["reponse_qcm"];
				$tab = array();
				$tab = preg_split('[-]', $reponse);
				//var_dump($lignesExo);

				
				
				
				 echo'<div class="form-group">
					<h2 class="StepTitle center">'.$lignesQcm[$i]["question"].'</h2><br>';
								for($itab = 0; $itab < sizeof($tab) ; $itab++)
								{
									echo '<div class="checkbox center">
											<label class="hover">
												<div class="icheckbox_flat-green checked hover" style="position: relative;"><input type="checkbox" name="'.$tab[$itab].'" class="flat"  style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 
												'.$tab[$itab].'<br>
											</label>
										</div>';
										//echo 'ok';
										
								}
				echo' </div><br>';
			
				
				//}
			}
		}
		catch (Exception $e) { 
		echo $e->errorMessage();
  		echo "->erreur afficheChapitreExos()";
		}
		
	}

?>