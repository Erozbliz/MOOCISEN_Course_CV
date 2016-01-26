<!DOCTYPE html>
<?php
    include '_include/connect.inc.php';
?>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mooc Master</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">

    <!-- Boite pour rotation -->
    <link href="css/rotating-card.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>



        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Bienvenue sur MOOCs</h1>
                    <p>Voici des MOOCs destinés aux étudiants ingénieurs afin de pouvoir former les étudiants </p>
                </div>
            </div>
        </div><br><br>
        <!-- /.container -->
        <div class="container">
            <div class="col-md-12 ">

        <?php
            include '_include/header.php';

            $select = $bdd->prepare("SELECT * FROM mooc");
            $select->execute();

            $lignes = $select->fetchAll();
           
            //var_dump($lignes);

            if(sizeof($lignes) == 0){
                echo 'Aucun MOOC présent';
            }

            else{

                for($i = 0; $i<sizeof($lignes); $i++){
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
                                                <h3 class="name"> '.$lignes[$i]["nom"].' </h3>
                                                <p class="profession">Jean-Michel Rolland</p>
                                                <h5><i class="fa fa-map-marker fa-fw text-muted"></i> France, Toulon</h5>
                                                <br><a href="#fakelink" class="btn btn-block btn-md btn-info">Inscription</a> 
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
                                            <h5 class="motto">'.$lignes[$i]["nom"].'</h5>
                                        </div> 
                                        <div class="content">
                                            <div class="main">
                                                <h4 class="text-center">Description : </h4>
                                                <p>'.$lignes[$i]["description"].'</p>
                                                <h4 class="text-center">Durée</h4>
                                                <p>'.$lignes[$i]["duree"]. 'heures</p>
                                                <h4 class="text-center">Prérequis</h4>
                                                <p>'.$lignes[$i]["prerequis"].'</p>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-simple" rel="tooltip" title="" onclick="rotateCard(this)" data-original-title="Flip Card">
                                                <i class="fa fa-reply"></i> Retour
                                            </button>
                                            <div class="social-links text-center">
                                                <a href="http://www.isen.fr/toulon/accueil/" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="http://www.isen.fr/toulon/accueil/" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="http://www.isen.fr/toulon/accueil/" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
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
    
    
    </script>


</body>

</html>
