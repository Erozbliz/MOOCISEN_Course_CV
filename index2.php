<?php
    include '_include/connect.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mooc Master test</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/icheck/flat/blue.css" rel="stylesheet">
    <link href="css/logo-nav.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
 
    <!-- Boite pour rotation -->
    <link href="css/rotating-card.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
         <?php
            include '_include/header.php';
            ?>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Bienvenue sur MOOCs</h1>
                    <p>Voici des MOOCs destinés aux étudiants </p>
                </div>
            </div>
        </div><br>
        <!-- /.container -->
        <div class="container">
            <div>
                 <?php

                 $select3 = $bdd->prepare("SELECT DISTINCT matiere FROM mooc");
                 $select3->execute();

                 $lignes3 = $select3->fetchAll();

                 //var_dump($lignes3);

                 for($k = 0; $k<sizeof($lignes3); $k++){

                    echo'
                        <input type="checkbox" class="subject" value='.$lignes3[$k]["matiere"].' onclick="filter2();"/>
                        <label>'.$lignes3[$k]["matiere"].'</label>';
                }

                ?>
            </div>

        <div class="col-md-12 ">

        <?php
            //include '_include/header.php';

            $id_mooc;

            $select = $bdd->prepare("SELECT * FROM mooc");
            $select->execute();

            $lignes = $select->fetchAll();

            if(sizeof($lignes) == 0){
                echo 'Aucun MOOC présent';
            }

            else{

                for($i = 0; $i<sizeof($lignes); $i++){

                    $id_mooc = $lignes[$i]["id_mooc"];

                    $select2 = $bdd->prepare("SELECT creer.id_mooc,creer.id_enseignant,enseignant.nom,enseignant.prenom FROM enseignant INNER JOIN creer ON enseignant.id_enseignant = creer.id_enseignant INNER JOIN mooc ON mooc.id_mooc = creer.id_mooc WHERE creer.id_mooc = $id_mooc");
                    $select2->execute();

                    $lignes2 = $select2->fetchAll();

                    echo '<div class="col-md-4 col-sm-6 animated zoomIn">
                            <div class="card-container manual-flip">
                                <div class="card">
                                    <div class="front">
                                        <div class="cover">
                                            <img src="images/rotating_card_thumb1.jpg">
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="images/cvr.png">
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">'.$lignes[$i]["nom"].'</h3>
                                                <p class="profession">ISEN Toulon</p>
                                                <p class="matiere">'.$lignes[$i]["matiere"].'</p>
												<form action="description.php" method="post">
													<button name="id" value='.$lignes[$i]["id_mooc"].'  class="btn btn-block btn-md btn-info">Description du cours</button>
												</form>
                
                                            </div>
                                            <div class="footer">
                                                <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> Informations
                                                </button>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back">
                                        <div class="header">
                                            <h3 class="motto">'.$lignes[$i]["nom"].'</h3>
                                        </div> 
                                        <div class="content">
                                            <div class="main">
                                                <p>
                                                    <strong>Description : </strong>
                                                    <span class="text-center text-justify">'.$lignes[$i]["description"].'</span><br><br>
                                                    <strong>Durée : </strong>
                                                    <span class="text-center">'.$lignes[$i]["duree"].' heures</span><br><br>
                                                    <strong>Nombre de chapitres : </strong>
                                                    <span class="text-center">'.$lignes[$i]["nb_chap"].'</span><br><br>
                                                    <strong>Prérequis : </strong>
                                                    <span class="text-center">'.$lignes[$i]["prerequis"].'</span><br><br>
                                                    <strong>Professeur : </strong>';
                                                    for($j=0;$j<sizeof($lignes2);$j++){
                                                        echo'<span class="text-center">'.$lignes2[$j]["prenom"].' '.$lignes2[$j]["nom"].'</span><br>';
                                                    }
                                                    echo'<br><br>
                                                    <strong>Matière : </strong>
                                                    <span class="text-center">'.$lignes[$i]["note"].'/5</span><br><br>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="footer">
                                            <button class="btn btn-simple" rel="tooltip" title="" onclick="rotateCard(this)" data-original-title="Flip Card">
                                                <i class="fa fa-reply"></i> Retour
                                            </button>
                                            <div class="social-links text-center">
                                                <a href="http://www.isen.fr/toulon/accueil/" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="http://www.isen.fr/toulon/accueil/" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                                <a href="http://www.isen.fr/toulon/accueil/" class="linkedin"><i class="fa fa-linkedin fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>';
                    }
                }
        ?>
                
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

        function rotateCard(btn){
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if($card.hasClass('hover')){
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }


        function filter2(){

            var valeurs = [];
            $("input[type=checkbox]").each(function(){
                if($(this).is(":checked")){
                    valeurs.push(($(this)).next('label').text());
                    console.log(valeurs);
                }
            });

            $(".matiere").each(function(){
                var matiere = $(this).text();

                if(valeurs.length == 0){
                   $(this).parents(".col-md-4").removeClass("hide").addClass("show"); 
                }

                else{

                    $(this).parents(".col-md-4").removeClass("show").addClass("hide");

                    for(l=0;l<valeurs.length;l++){
                        if(matiere == valeurs[l]){
                            $(this).parents(".col-md-4").removeClass("hide").addClass("show");
                        }
                    }
                }
            });
        }

        $('input').focusin(function(){
            $(this).removeAttr('placeholder');
        });

        $('input').focusout(function(){
            $(this).attr('placeholder','Rechercher un cours');
        });
        
    </script>


</body>

</html>
