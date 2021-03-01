<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Novi tip nekretnine</title>
</head>
<body style="background-color:black;">

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
        <h2 class="text-center mt-5 text-white">Dodajte tip nekretnine koji zelite da objavite</h2>
        <div class="mt-5"> 
            <form action="../dodavanje/dodaj_tip.php" method="POST">
                <input type="text"  name="naziv" class="form-control" placeholder="Naziv tipa...">
                <button class="btn btn-success form-control mt-3">Sacuvaj</button>
            </form>
        </div>
    </div>
</body>
</html>
