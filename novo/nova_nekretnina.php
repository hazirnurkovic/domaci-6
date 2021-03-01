<?php

    include '../dbconn.php';
    $sql_grad = "SELECT * FROM grad ORDER BY naziv";
    $rez_grad = mysqli_query($dbconn, $sql_grad);

    $sql_tip_nekretnine = "SELECT * FROM `tip-nekretnine`";
    $rez_tip_nekretnine = mysqli_query($dbconn, $sql_tip_nekretnine);

    $sql_tip_oglasa = "SELECT * FROM `tip-oglasa`";
    $rez_tip_oglasa = mysqli_query($dbconn, $sql_tip_oglasa);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dodaj nekretninu</title>
</head>
<body style="background-image: url('../Images/pozadina_nova.jpg');">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ml-3 mr-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link text-light text-uppercase" href="../index.php">Pocetna<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase" href="../gradovi.php">Gradovi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase" href="../tip_nekretnine.php">Tip nekretnine</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mt-5 text-white bg-warning">Dodajte novu nekretninu koju zelite da objavite</h2>
        <form action="../dodavanje/dodaj_nekretninu.php" method="POST" enctype="multipart/form-data">

            <div class="row mt-5">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="grad" class="bg-success">Odaberite grad</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="grad" class="form-control-sm">
                        <?php
                            while($row1 = mysqli_fetch_assoc($rez_grad))
                            {
                                echo "<option value=".$row1['ID'].">".$row1['naziv']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="tip_oglasa" class="bg-primary">Odaberite tip glasa</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="tip_oglasa" class="form-control-sm">
                        <?php
                            while($row3 = mysqli_fetch_assoc($rez_tip_oglasa))
                            {
                                echo "<option value=".$row3['ID'].">".$row3['naziv']."</option>";
                            }
                        ?>
                    </select>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="tip_nekretnine" class="bg-success">Odaberite tip nekretnine</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="tip_nekretnine" class="form-control-sm">
                        <?php
                            while($row2 = mysqli_fetch_assoc($rez_tip_nekretnine))
                            {
                                echo "<option value=".$row2['ID'].">".$row2['naziv_tipa']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="povrsina" class="bg-primary">Unesite povrsinu [ m&sup2; ]</label>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required name="povrsina" type="text" class="form-control-sm" placeholder="povrsina...">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="cijena" class="bg-success">Unesite cijenu [ &euro; ]</label>
                </div>
                    
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required name="cijena" type="text" class="form-control-sm" placeholder="cijena...">
                </div>
                

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="godina" class="bg-primary">Unesite godinu</label>
                </div>
                    
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required name="godina" type="number" class="form-control-sm" placeholder="godina...">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="status" class="bg-success">DOSTUPNO</label>
                    <input type="radio" name="status" value="Dostupno">
                </div>

                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="status" class="bg-danger">PRODATO</label>
                    <input type="radio" name="status" value="Prodato">
                </div>

                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="status" class="bg-primary">DATUM PRODAJE</label>
                    <input type="date" name="datum">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 form-control-sm">
                    <textarea required class="form-control" name="opis" placeholder="Opis..."></textarea>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-6 form-control-sm">
                    <input class="form-control-sm file" type="file" name="slike[]" multiple="multiple">
                </div>
                <div class="col-6 form-control-sm">
                    <button class="form-control btn btn-success">Sacuvaj</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>