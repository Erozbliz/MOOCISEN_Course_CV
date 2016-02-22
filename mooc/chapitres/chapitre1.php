<?php
    include '../../_include/connect.inc.php';
?>
<html>
    <head>
    </head>
    <body>
		<div class="box row-fluid"> 
			<!-- ============================================================================================================= -->                         
			<div class="chapitre">
					<div class="panel-body" style="display: block;">
						<h2>Identité</h2>
						<?php 
						$valid = 1;
						$idMooc;
						 if (isset($_POST['id'])) {
							$idMooc = $_POST['id'];								
							//echo $idMooc;
						}else{
							$valid = 0;
							echo'erreur';
						}
						
						include '../../_model/requeteChapitre.php';
						include '../../_model/requetePartieMenu.php';
						
						
						chapitres($idMooc);
						
						?>
					</div>                          
			</div>
			<!-- ============================================================================================================= -->                         
		</div>
</html>
