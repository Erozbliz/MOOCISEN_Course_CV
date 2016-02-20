<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Le titre du document</title>
    <link rel="stylesheet" type="text/css" href="feuille-de-styles.css">
  </head>
  <body>
    <!-- Une ou plusieurs balises HTML pour définir le contenu du document -->
	<?php
	
	include 'chapitre.php';
	
	$valid = 1;
			$idMooc;
			 if (isset($_POST['id'])) {
				$idMooc = $_POST['id'];								
				//echo $idMooc;
			}else{
				$valid = 0;
				echo'erreur';
			}
	
	include_once ('function.php');

			$max=30;
			$steps=readsteps($max);

			for($i=0;$i<count($steps);$i++)
			{
				echo $steps[$i];
			}
	?>
	
	<div class="col-sm-12">
			      <div class="pull-right">
					<button type="button" class="action btn-success text-capitalize back btn">Retour</button>
					<button type="button" class="action btn-success text-capitalize next btn">Suivant</button>
			      </div>
			  </div>
	
	
	
    <script src="jquery.js"></script>
    <script src="mon-script.js"></script>
  </body>
</html>