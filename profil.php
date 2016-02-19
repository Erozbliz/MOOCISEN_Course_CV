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

                 $select3 = $bdd->prepare("SELECT nom,prenom,email,pays  FROM user WHERE id_user = '17'");
                 $select3->execute();

                 $lignes3 = $select3->fetchAll();

                

                ?>
            </div>

        <div class="col-md-12 ">

        </div>
    </div>
</body>

</html>
