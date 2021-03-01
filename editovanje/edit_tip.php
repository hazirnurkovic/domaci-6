<?php
    include '../dbconn.php';
    $sql_sel = "SELECT * from `tip-nekretnine` WHERE ID = '".$_GET['id']."'";
    $rez_sel = mysqli_query($dbconn, $sql_sel);
    $row = mysqli_fetch_assoc($rez_sel);

    if (isset($_POST['naziv']) && $_POST['naziv']!="") {
        $naziv = $_POST['naziv'];
        $sql_update = "UPDATE `tip-nekretnine` SET naziv_tipa = '$naziv' WHERE ID = '".$_GET['id']."'";
        $rez_update = mysqli_query($dbconn, $sql_update);
        if ($rez_update) 
        {
            header("location: ../index.php?msg=uspjesno");
        }
        else{
            header("location: ../index.php?msg=greska");
        }
    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editovanje tipa</title>
</head>
<body style="background-color:black;">
    
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center mt-5 mb-5 text-white">Uredite informacije o tipu nekretnine</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?=$row['ID']?>">
                <input type="text" class="form-control" name="naziv" value="<?=$row['naziv_tipa']?>">
                <button class="btn mt-1 btn-success form-control">Sacuvaj</button>
            </form>
        </div>
    </div>

</body>
</html>