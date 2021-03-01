<?php
    include 'dbconn.php';

    if(isset($_POST['submit']))
    {
       if(isset($_POST['gradP']) && $_POST['gradP']!="")
       {
           $grad = $_POST['gradP'];
           $q1 = "grad_id = $grad";
       }
       else
       {
           $q1 = "1=1";
       }

       if(isset($_POST['tnP']) && $_POST['tnP']!="")
       {
           $tip = $_POST['tnP'];
           $q2 = "tip_id = $tip";
       }
       else
       {
           $q2 = "1=1";
       }

       if(isset($_POST['ogP']) && $_POST['ogP']!="")
       {
           $oglas = $_POST['ogP'];
           $q3 = "oglas_id = $oglas";
       }
       else
       {
           $q3 = "1=1";
       }

       if (isset($_POST['od']) && isset($_POST['do']) == "") 
       {
           $povrsina1 = $_POST['od'];
           $q4 = "povrsina >= $povrsina1";

       }
       elseif(isset($_POST['do']) && isset($_POST['od']) == "")
       {
        $povrsina1 = $_POST['do'];
        $q4 = "povrsina <= $povrsina2";
       }
       elseif(isset($_POST['od']) && isset($_POST['do']) && $_POST['od']!="" && $_POST['do']!="")
       {    
        $povrsina1 = $_POST['od'];
        $povrsina2 = $_POST['do'];
        $q4 = "povrsina >= $povrsina1 AND povrsina <= $povrsina2";
       }
       else{
        $q4 = "1=1";
       }

       if(isset($_POST['min']) && isset($_POST['max']) == "")
       {
           $cijena1 = $_POST['min'];
           $q5 = "cijena >= $cijena1";
       }
       elseif(isset($_POST['max']) && isset($_POST['min']) == "")
       {
           $cijena1 = $_POST['max'];
           $q5 = "cijena <= $cijena1";
       }
       elseif(isset($_POST['min']) && isset($_POST['max']) && $_POST['max']!="" && $_POST['min']!="")
       {
           $cijena1 = $_POST['min'];
           $cijena2 = $_POST['max'];
           $q5 = "cijena >= $cijena1 AND cijena <= $cijena2";
       }
       else
       {
           $q5 = "1=1";
       }

       if (isset($_POST['god']) && $_POST['god']!="")
       {
           $god = $_POST['god'];
           $q6 = "godina = $god";
       }
       else{
           $q6 = "1=1";
       }

       $sql = "SELECT n.ID, g.naziv as grad, tn.naziv_tipa, tog.naziv, n.povrsina, n.cijena, n.status, n.godina
       FROM grad g,nekretnina n, `tip-nekretnine` tn, `tip-oglasa` as tog
       WHERE n.grad_id = g.ID AND n.tip_id = tn.ID AND n.oglas_id = tog.ID AND $q1 AND $q2 AND $q3 AND $q4 AND $q5 AND $q6";

       $rez = mysqli_query($dbconn, $sql);
    }
    else
    {
        $sql = "SELECT n.ID, g.naziv as grad, tn.naziv_tipa, tog.naziv, n.povrsina, n.cijena, n.status, n.godina
            FROM grad g,nekretnina n, `tip-nekretnine` tn, `tip-oglasa` as tog
            WHERE n.grad_id = g.ID AND n.tip_id = tn.ID AND n.oglas_id = tog.ID";
        $rez = mysqli_query($dbconn, $sql);
    }
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.css">
    <link rel="stylesheet" href="style1.css">
    <title>Pocetna</title>
</head>
<body style="background-image: url('./Images/pozadina.jpg');">
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


    <div class="row mt-4">
        <div class="col-2"></div>
        <div class="col-8">
            
            <form action="" method="POST" class="bg-dark p-3 text-white">
                <h1 class="text-light text-center mb-3">Pretraga</h1>
                <label for="gradP">Grad: </label>
                <select name="gradP" class="form-control mt-2">
                    <option value="">Odaberite grad</option>
                    <?php
                        $sqlg = "SELECT * FROM grad";
                        $rezg = mysqli_query($dbconn, $sqlg);
                        while($redg = mysqli_fetch_assoc($rezg))
                        {
                            echo "<option value=".$redg['ID'].">".$redg['naziv']."</option>";
                        }
                    ?>
                </select>
                
                <label for="tnP">Tip nekretnine:</label>
                <select name="tnP" class="form-control mt-2">
                    <option value="">Odaberite tip</option>
                    <?php
                        $sqltn = "SELECT * FROM `tip-nekretnine`";
                        $reztn = mysqli_query($dbconn, $sqltn);
                        while($redtn = mysqli_fetch_assoc($reztn))
                        {
                            echo "<option value=".$redtn['ID'].">".$redtn['naziv_tipa']."</option>";
                        }
                    ?>
                </select>

                <label for="ogP">Tip oglasa:</label>
                <select name="ogP" class="form-control mt-2">
                    <option value="">Odaberite tip</option>
                    <?php
                        $sqlog = "SELECT * FROM `tip-oglasa`";
                        $rezog = mysqli_query($dbconn, $sqlog);
                        while($redog = mysqli_fetch_assoc($rezog))
                        {
                            echo "<option value=".$redog['ID'].">".$redog['naziv']."</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="od">Minimalna povrsina:</label>
                <input class="form-control-sm mt-2" type="text" name="od" placeholder="Od">

                <label for="do">Maksimalna povrsina:</label>
                <input class="form-control-sm mt-2" type="text" name="do" placeholder="Do">
                <br>
                <label for="min">Minimalna cijena:</label>
                <input class="form-control-sm mt-2" type="text" name="min" placeholder="Min">

                <label for="max">Maximalna cijena:</label>
                <input class="form-control-sm mt-2" type="text" name="max" placeholder="Max">
                <br>
                <label for="god">Godina:</label>
                <input  class="form-control mt-2" type="number" name="god" placeholder="Godina...">
                <br>

                <input type="submit" name="submit"class="btn-success form-control mt-2" value="Pretrazi">
            </form>
        </div>

        <div class="col col-lg-4 col-md-4 col-sm-2"></div>

    </div>

    <div class="row mb-4">
        <div class="col-12 mt-4">
            <a href="./novo/nova_nekretnina.php"><i class="fas fa-plus-circle text-light bg-primary ml-3">  Dodaj nekretninu</i></a>
            <table class="table table-responsive w-100 d-block d-md-table table-bordered table-dark bg-dark table-hover text-center mt-3">
                <thead class="bg-success">
                    <tr>
                        <th>Grad</th>
                        <th>Tip nekretnine</th>
                        <th>Tip oglasa</th>
                        <th>Povrsina</th>
                        <th>Cijena</th>
                        <th>Godina</th>
                        <th>Status</th>
                        <th>Detalji</th>
                        <th>Uredi</th>
                        <th>Obrisi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        if ($rez != NULL)                       
                        {
                            while($red = mysqli_fetch_assoc($rez))
                            {   
                                $idtemp = $red['ID'];
                                $link1 = "<a href=\"detalji.php?id=$idtemp\">Detalji</a>";
                                $link2 = "<a href=\"./editovanje/edit_nekretninu.php?id=$idtemp\">Uredi</a>";
                                $link3 = "<a href=\"./brisanje/obrisi_nekretninu.php?id=$idtemp\">Obrisi</a>";
                                echo "<tr>";
                                    echo "<td>".$red['grad']."</td>";
                                    echo "<td>".$red['naziv_tipa']."</td>";
                                    echo "<td>".$red['naziv']."</td>";
                                    echo "<td>".$red['povrsina']."m&sup2;"."</td>";
                                    echo "<td>".$red['cijena']."&euro;"."</td>";
                                    echo "<td>".$red['godina']."</td>";
                                    echo "<td>".$red['status']."</td>";
                                    echo "<td>".$link1."</td>";
                                    echo "<td>".$link2."</td>";
                                    echo "<td>".$link3."</td>";
                                echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>