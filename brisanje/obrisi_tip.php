<?php
    include '../dbconn.php';


    if (isset($_GET['id']) && is_numeric($_GET['id'])) 
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM `tip-nekretnine` WHERE ID = $id";
        $rez = mysqli_query($dbconn, $sql);

        if ($rez) {
            header("location: ../index.php?msg=uspjesno");
        }
        else
        {
            header("location: ../index.php?msg=greska");
        }
    }
    else
    {
        exit();
        echo "INVALID ID...";
    }

?>