<?php

    include '../dbconn.php';

    if(isset($_POST['grad']) && isset($_POST['tip_oglasa']) && isset($_POST['tip_nekretnine']))
    {
        $grad = $_POST['grad'];
        $oglas = $_POST['tip_oglasa'];
        $nekretnina = $_POST['tip_nekretnine'];
    }

    if(isset($_POST['povrsina']) && $_POST['povrsina'] != "")
    {
        $povrsina = $_POST['povrsina'];
    }

    if(isset($_POST['godina']) && is_numeric($_POST['godina']))
    {
        $godina = $_POST['godina'];
    }

    if(isset($_POST['cijena']) && $_POST['cijena'] != "")
    {
        $cijena = $_POST['cijena'];
    }

    if(isset($_POST['opis']) && $_POST['opis'] != "")
    {
        $opis = $_POST['opis'];
    }

    if(isset($_POST['status']) && $_POST['status']!="")
    {
        $status = $_POST['status'];
    }

    if(isset($_POST['datum']) && $_POST['datum']!="")
    {
        $datum = $_POST['datum'];
    }
    else
    {
        $datum="NULL";
    }

    $sql = "INSERT INTO `nekretnina` (
            godina,
            povrsina,
            opis,
            cijena,
            grad_id,
            tip_id,
            oglas_id,
            status,
            datum
            ) 
            VALUES
            (
            $godina,
            '$povrsina',
            '$opis',
            '$cijena',
            $grad,
            $nekretnina,
            $oglas,
            '$status',
            '$datum'
            )";

        $rez = mysqli_query($dbconn, $sql);

        $id = mysqli_insert_id($dbconn);
        if (isset($_FILES['slike'])) 
        {
            $count = count($_FILES['slike']['name']);
            for($i=0; $i<$count; $i++)
            {
                $tmpFile = $_FILES['slike']['tmp_name'][$i];

                if ($tmpFile != "") 
                {
                    $new_file = "../uploads/".uniqid()."_".$_FILES['slike']['name'][$i];

                    if (move_uploaded_file($tmpFile, $new_file))
                    {
                        $sql_sl = "INSERT INTO fotografija (naziv, nekretnina_ID) VALUES('$new_file', $id)";
                        $rez_sl = mysqli_query($dbconn, $sql_sl);
                        if (!$rez_sl)
                        {
                            exit("error...");
                        }
                    }
                    else
                    { 
                        exit("ERROR...");

                    }
                    
                }
            }
        }
        
    if($rez)
    {
        header("location: ../index.php?msg=uspjesno");
    }
    else
    {
        header("location: ../index.php?msg=greska");
    }
    
    

?>