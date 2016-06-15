<!DOCTYPE html>
<?php
    include '_include/connect.inc.php';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Page chapitre</title>
    <link rel="stylesheet" type="text/css" href="feuille-de-styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.textarea_autosize.min.js"></script>
  </head>
  <body>
    <!-- Une ou plusieurs balises HTML pour définir le contenu du document -->
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
	
			
	
	include_once ('_model/fonctionChap.php');

			$max=30;
			$chaps=readchaps($max);

			for($i=0;$i<count($chaps);$i++)
			{
				echo $chaps[$i];
			}
	?>
	
			      
	<button type="button" class="action btn-success text-capitalize back btn">Retour</button>
	<button type="button" class="action btn-success text-capitalize next btn">Suivant</button>
			     
	
	
<script type="text/javascript">	

	$(document).ready(function(){
		var current = 0;
		widget      = $(".chapitre");
		btnnext     = $(".next");
		btnback     = $(".back");
	
		
        //pour voir toute les etapes en une seule page
        var allinonepage=false;
		
        if(!allinonepage)
        {
        // Init buttons and UI
		widget.not(':eq('+current+')').hide();
        }

		
		//bouton suivant
        btnnext.click(function(){
			
			widget.eq(current).hide();
			current ++;
			widget.eq(current).show();
        });


        // bouton retour
        btnback.click(function(){
			if(current != 0)
			{
				widget.eq(current).hide();
				current --;
				widget.eq(current).show();
			}
        });
		
	
		
  });
</script>
    <script src="jquery.js"></script>
    <script src="mon-script.js"></script>
  </body>
</html>