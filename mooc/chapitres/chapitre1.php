<html>
    <head>
	<meta charset="UTF-8">
    </head>
    <body>
		<div class="box row-fluid"> 
			<!-- ============================================================================================================= -->                         
			<div class="chapitre">
					<div class="panel-body" style="display: block;">
						<h2>Identité</h2>
						<?php 
						include '../../_include/connect.inc.php';
						include '../../_model/requeteMooc.php';
						include '../../_model/Qcm.php';
						
						$valid = 1;
						$idMooc;
						 if (isset($_POST['id'])) {
							$idMooc = $_POST['id'];								
							//echo $idMooc;
						}else{
							$valid = 0;
							echo'erreur';
						}
						
						chapitresplusSousPartie($idMooc,$bdd);
						$idChapitre = idParNumeroChapitre($idMooc,$bdd,0); // indice 0 pour le premier chapitre
						if($idChapitre != -1) // -1 signifie que le chapitre n'existe pas
						{	
							$numeroExercice = 0;
							$idExercice = idParNumeroExo($idMooc,$idChapitre,$bdd,$numeroExercice); // -1 signifie que l'exercice n'existe pas
							if($idExercice != -1)
							{
								exoQcm($idMooc,$idChapitre,$idExercice,$bdd,$numeroExercice);
							}
						}
						
						?>
					</div>                          
			</div>
			<!-- ============================================================================================================= -->                         
		</div>
</html>
