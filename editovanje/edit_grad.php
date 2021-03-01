<?php
    include '../dbconn.php';

    if(isset($_POST['edit']))
    {

        if(isset($_POST['naziv']) && $_POST['naziv']!="")
        {
            $naziv = $_POST['naziv'];
        }

        $sql_update = "UPDATE grad SET naziv = '$naziv' WHERE ID = '".$_GET['id']."'";
        $rez_update = mysqli_query($dbconn, $sql_update);
        if($rez_update)
        {
            header("location: ../index.php?msg=editovano");
        }
        else
        {
            header("location: ../index.php?msg=greska");
        }
    }
    
    $sql_sel = "SELECT * from grad WHERE ID = '".$_GET['id']."'";
    $rez_sel = mysqli_query($dbconn, $sql_sel);
    $row = mysqli_fetch_assoc($rez_sel);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body style="background-color:black;">
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center mt-5 text-white mb-5">Uredite informacije o gradu</h2>
            <form action="" method="POST">
                <input class="form-control mt-3" type="hidden" name="id" value="<?=$row['ID']?>">
                <input class="form-control mt-3" type="text" name="naziv" value="<?=$row['naziv']?>">
                <input type="submit" name="edit" class="mt-3 btn btn-success form-control" value="Sacuvaj">
            </form>
        </div>
    </div>
</body>
</html>