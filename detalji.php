<?php

    include 'dbconn.php';
    $sql = "SELECT n.ID, g.naziv as grad, tn.naziv_tipa, tog.naziv, n.povrsina, n.cijena, n.status, n.godina, opis
    FROM grad g,nekretnina n, `tip-nekretnine` tn, `tip-oglasa` as tog
    WHERE n.grad_id = g.ID AND n.tip_id = tn.ID AND n.oglas_id = tog.ID AND n.ID = '".$_GET['id']."'";
    $rez = mysqli_query($dbconn, $sql);
    $red = mysqli_fetch_assoc($rez);

    $sql_sl = "SELECT * FROM fotografija WHERE nekretnina_ID = '".$_GET['id']."'";
    $rez_sl = mysqli_query($dbconn, $sql_sl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    /* Make the image fully responsive */
    .carousel-item img 
    {
        height: 100%;
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detalji nekretnine</title>
</head>
<body style="background-image: url('./Images/pozadina_detalj.jpg');">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ml-3 mr-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-light text-uppercase" href="index.php">Pocetna<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-uppercase" href="gradovi.php">Gradovi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-uppercase" href="tip_nekretnine.php">Tip nekretnine</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-3"></div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $count = 0;
                            while($red_sl = mysqli_fetch_assoc($rez_sl))
                            {
                                $naziv = substr($red_sl['naziv'], 1);
                                if ($count == 0) 
                                {
                                    echo "<div class=\"carousel-item active\">";
                                        echo "<img class=\"d-block w-100\" src=\"".$naziv."\">";
                                    echo "</div>";
                                }
                                else
                                {
                                    echo "<div class=\"carousel-item\">";
                                        echo "<img class=\"d-block w-100\" src=\"".$naziv."\">";
                                    echo "</div>";
                                }
                               $count++;
                               
                            }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Detalji o nekretnini</h5>
                        <p class="card-text"><b>Opis:</b> <?=$red['opis']?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Grad:</b> <?=$red['grad']?></li>
                        <li class="list-group-item"><b>Tip:</b> <?=$red['naziv_tipa']?></li>
                        <li class="list-group-item"><b>Oglas:</b> <?=$red['naziv']?></li>
                        <li class="list-group-item"><b>Povrsina:</b> <?=$red['povrsina']?> m&sup2;</li>
                        <li class="list-group-item"><b>Cijena:</b> <?=$red['cijena']?> &euro; </li>
                        <li class="list-group-item"><b>Godina:</b> <?=$red['godina']?> </li>
                        <li class="list-group-item"><b>Status:</b> <?=$red['status']?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2"></div>
        </div>
    </div>
</body>
</html>