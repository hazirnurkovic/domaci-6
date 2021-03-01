<?php

    include '../dbconn.php';
    
    $sql = "SELECT n.ID, g.ID as grID, tn.ID as tnID, tog.ID as togID, g.naziv as grad, tn.naziv_tipa, tog.naziv as tnaziv, n.povrsina, n.cijena, n.status, n.godina, n.datum, n.opis
                       FROM grad g,nekretnina n, `tip-nekretnine` tn, `tip-oglasa` as tog
                       WHERE n.grad_id = g.ID AND n.tip_id = tn.ID AND n.oglas_id = tog.ID AND n.ID = '".$_GET['id']."'";
    
    $rez = mysqli_query($dbconn, $sql);
    $red = mysqli_fetch_assoc($rez);
    $id = $red['ID'];

   $sqlG = "SELECT * FROM grad";
   $rezG = mysqli_query($dbconn, $sqlG);
    
   $sqlTN = "SELECT * FROM `tip-nekretnine`";
   $rezTN = mysqli_query($dbconn, $sqlTN);
   
   $sqlOG = "SELECT * FROM `tip-oglasa`";
   $rezOG = mysqli_query($dbconn, $sqlOG);

   if (isset($_POST['submit'])) {
    if (isset($_POST['grad']) && isset($_POST['tip_oglasa']) && isset($_POST['tip_nekretnine'])) 
    {
        $grad = $_POST['grad'];
        $tip_oglasa = $_POST['tip_oglasa'];
        $tip_nekretnine = $_POST['tip_nekretnine'];
    }
 
    if (isset($_POST['povrsina']) && $_POST['povrsina']!="") {
        $povrsina = $_POST['povrsina'];
    }
 
    if (isset($_POST['cijena']) && $_POST['cijena']!="") {
        $cijena = $_POST['cijena'];
    }
 
    if (isset($_POST['godina']) && $_POST['godina']!="") {
        $godina = $_POST['godina'];
    }
 
    if (isset($_POST['status']) && $_POST['status']!="") {
        $status = $_POST['status'];
    }
    if (isset($_POST['opis']) && $_POST['opis']!="") {
        $opis = $_POST['opis'];
    }
    if (isset($_POST['datum']) && $_POST['datum']!="") {
        $datum = $_POST['datum'];
    }
    else{
        $datum = "NULL";
    }
 
    $sql_upd = "UPDATE nekretnina SET
                 godina = $godina,
                 povrsina = '$povrsina',
                 opis = '$opis',
                 cijena = '$cijena',
                 status = '$status',
                 datum = '$datum',
                 grad_id = $grad,
                 tip_id = $tip_nekretnine,
                 oglas_id = $tip_oglasa
             WHERE ID = '".$_POST['id']."'";
     
     $rez_upd = mysqli_query($dbconn, $sql_upd);
     if ($rez_upd) {
         header("location: ../index.php?ms=success");
     }
     else
     {
         header("location: ../index.php?msg=error");
     }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_nekretnina.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dodaj nekretninu</title>
</head>
<body style="background-image: url('../Images/pozadina_edit.jpg');">

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
        <h2 class="text-center mt-5 bg-dark text-light">Uredite nekretninu</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$red['ID']?>">
            <div class="row mt-5">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="grad" class="bg-dark text-light">Odaberite grad</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="grad" class="form-control-sm">
                    <option value="<?=$red['grID']?>"><?=$red['grad']?></option>
                        <?php
                            while($redG = mysqli_fetch_assoc($rezG))
                            {
                                echo "<option value=".$redG['ID'].">".$redG['naziv']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="tip_oglasa" class="bg-dark text-light">Odaberite tip glasa</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="tip_oglasa" class="form-control-sm">
                        <option value="<?=$red['togID']?>"><?=$red['tnaziv']?></option>
                        <?php
                            while($redOG = mysqli_fetch_assoc($rezOG))
                            {
                                echo "<option value=".$redOG['ID'].">".$redOG['naziv']."</option>";
                            }
                        ?>
                    </select>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="tip_nekretnine" class="bg-dark text-light">Odaberite tip nekretnine</label>
                </div>

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <select name="tip_nekretnine" class="form-control-sm">
                            <option value="<?=$red['tnID']?>"><?=$red['naziv_tipa']?></option>
                        <?php
                            while($redTN = mysqli_fetch_assoc($rezTN))
                            {
                                echo "<option value=".$redTN['ID'].">".$redTN['naziv_tipa']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="povrsina" class="bg-dark text-light">Unesite povrsinu [ m&sup2; ]</label>
                </div>
                
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required name="povrsina" value="<?=$red['povrsina']?>" type="text" class="form-control-sm" placeholder="povrsina...">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="cijena" class="bg-dark text-light">Unesite cijenu [ &euro; ]</label>
                </div>
                    
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required value="<?=$red['cijena']?>" name="cijena" type="text" class="form-control-sm" placeholder="cijena...">
                </div>
                

                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <label for="godina" class="bg-dark text-light">Unesite godinu</label>
                </div>
                    
                <div class="col col-6 mt-3 col-lg-3 form-control-sm">
                    <input required name="godina" value="<?=$red['godina']?>" type="number" class="form-control-sm" placeholder="godina...">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="status" class="font-weight-bold bg-dark text-primary">DOSTUPNO</label>
                    <input type="radio" name="status" value="Dostupno">
                </div>

                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="status" class="font-weight-bold text-danger bg-dark">PRODATO</label>
                    <input type="radio" name="status" value="Prodato">
                </div>

                <div class="col col-4 mt-3 col-lg-4 form-control-sm">
                    <label for="datum" class="font-weight-bold text-success bg-dark">DATUM PRODAJE</label>
                    <input type="date" value="<?=$red['datum']?>" name="datum">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 form-control-sm">
                    <textarea required class="form-control" name="opis" placeholder="Opis..."><?=$red['opis']?></textarea>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-6 form-control-sm">
                    <input type="submit" name="submit" value="Sacuvaj"  class="form-control btn btn-success">
                </div>
            </div>
        </form>
    </div>
</body>
</html>