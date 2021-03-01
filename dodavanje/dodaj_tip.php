<?php
    include '../dbconn.php';

    if(isset($_POST['naziv']) && $_POST['naziv'] != '') 
    {
       $naziv_tipa = $_POST['naziv'];
    }
    else
    {
        header("location: novi_tip.html?msg=error");
    }

    $res = mysqli_query($dbconn, "INSERT INTO `tip-nekretnine`(naziv_tipa) VALUE ('$naziv_tipa')");
    if($res)
    {
        header("location: ../index.php?msg=uspjesno");
    }
    else
    {
        header("location: ../novo/novi_tip.html?msg=error");
    }
?>