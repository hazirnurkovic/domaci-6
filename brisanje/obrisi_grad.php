<?php
    include '../dbconn.php';

    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "DELETE from `grad` where ID = $id";
        $res = mysqli_query($dbconn, $sql);

        if($res)
        {
            header("location: ../index.php?msg=deleted");
        }
        else
        {
            header("location: ../index.php?msg=error");
        }
    }
    else
    {
        exit("Error...");
        echo("Invalid ID");
    }
?>