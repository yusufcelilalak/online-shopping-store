<?php

include "config.php";

$host = HOST;
$port = PORT;
$user = USERNAME;
$pass = PASSWORD;
$db = DB;

global $con;
$con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass") or die ("Could not connect to Server\n");

if(!$con){
    echo "Error : Unable to open database\n";
}
else
{
    //echo "Successful!\n";
}

?>