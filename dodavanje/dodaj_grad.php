<?php
    include "../dbconn.php";

    if(isset($_POST['naziv']) && $_POST['naziv']!="")
    {
        $grad = $_POST['naziv'];
    }

    $sql = "INSERT INTO `grad` (naziv) VALUES ('$grad')";
    $rez = mysqli_query($dbconn, $sql);
    if($rez)
    {
        header("location: ..index.php?msg=dodato");
    }
    else
    {
        header("location: ../index.php?msg=dodato");
    }
?>