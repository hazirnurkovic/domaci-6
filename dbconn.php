<?php

    $dbconn = mysqli_connect("localhost", "root", "", "agencija-za-nekretnine");
    if(!$dbconn)
    {
        exit("Error...".mysqli_connect_error());
        echo "ERROR...";
    }

?>