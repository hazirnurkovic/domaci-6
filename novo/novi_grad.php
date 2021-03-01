<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dodaj grad</title>
</head>
<body style="background-image: url('../Images/pozadina_grad.jpg');">

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
        <h2 class="text-center mt-5 text-white">Dodajte grad u listu gradova</h2>
        <form action="../dodavanje/dodaj_grad.php" method="POST">
            <input class="form-control mt-3 bg-light" placeholder="Naziv grada" type="text" require name="naziv">
            <button class="btn btn-success mt-3">Sacuvaj</button>
        </form>
    </div>

</body>
</html>