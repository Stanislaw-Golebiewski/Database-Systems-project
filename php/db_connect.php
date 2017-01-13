<?php 
    //****************
    $host = "localhost";
    $user = "postgres";
    $pass = "lubiekoty";
    $db   = "shop";
    //****************
    //Connect to postgres database
    $connection = pg_connect("host=$host dbname=$db user=$user password=$pass")
                  or die ("Could not connect to server\n");
?>