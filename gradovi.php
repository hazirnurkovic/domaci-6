<?php
    include 'dbconn.php';

    if (isset($_POST['pretraga']) && $_POST['pretraga']!="") {
        $pretraga = $_POST['pretraga'];
        $sql = "SELECT * FROM grad WHERE '1=1' AND grad.naziv LIKE '%$pretraga%'";
    }
    else{
        $sql = "SELECT * FROM grad";
    }

    $res = mysqli_query($dbconn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.css">
    <title>Svi gradovi</title>
</head>
<body style="background-image: url('./Images/pozadina_grad.jpg');"">

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
    <form action="" method="post">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <input type="text" name="pretraga" class="form-control mt-3 mb-3" placeholder="Pretrazi grad...">
            </div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <button class="btn btn-success mb-3 form-control">Pretrazi</button>
            </div>
            <div class="col-4"></div>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-4"></div>
            <div class="gradovi col-sm-12 col-lg-4">
                    <a href="./novo/novi_grad.php"><i class="fas fa-plus-circle text-white ml-3"> Dodaj</i></a>
                    <table class="table table-bordered bg-dark table-dark table-hover text-center mt-3">
                        <thead class="bg-success">
                            <tr>
                                <th>ID</th>
                                <th>Naziv</th>
                                <th>Obrisi</th>
                                <th>Edituj</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($res))
                                {   
                                    $idtemp = $row['ID'];
                                    $link1 = "<a href=\"./brisanje/obrisi_grad.php?id=$idtemp\">Obrisi</a>";
                                    $link2 = "<a href=\"./editovanje/edit_grad.php?id=$idtemp\">Uredi</a>";
                                    echo "<tr>";
                                    echo "<td>".$row['ID']."</td>";
                                    echo "<td>".$row['naziv']."</td>";
                                    echo "<td>".$link1."</td>";
                                    echo "<td>".$link2."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
            </div>
            <div class="col-lg-4"></div>
    </div>
</div>
</body>
</html>