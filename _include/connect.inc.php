	<?php 
    $connect_str= "mysql:host=localhost;dbname=mooc";
    $connect_user= 'root';
    $connect_pass= '';
    try
    {
        $bdd= new PDO($connect_str, $connect_user, $connect_pass); 
        $utf8 = $bdd->prepare("SET NAMES UTF8");
        $utf8->execute();
    

    }
    catch(PDOException $e)
    {
        //header ("location: index.php?erreur=Echec de la connexion"); //Affichage du message d'erreur sur l'index avec le méthode get

        echo "Erreur au niveau de la BDD (verifier si la BDD existe)";
        exit();
    }
?>