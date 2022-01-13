<?php
include "connect.php";
session_start();

if(isset($_SESSION['id']) && isset($_POST['submit']))
{
    
    $id = $_SESSION['id'];

    
    $pName = $_POST["inputName"];
    $pSurname = $_POST["inputSurname"];
    $pEmail = $_POST["inputEmail"];
    $pPassword = $_POST["inputPassword"];
    $pAddress = $_POST["inputAddress"];
    $pCity = $_POST["inputCity"];
    $pCountry = $_POST["inputCountry"];
    $pZip = $_POST["inputZip"];

    
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['tmp_name'];
    
    if($fileName!="")
    {
        $img = fopen($fileName, 'r') or die("cannot read image\n");
        $data = fread($img, filesize($fileName));
        $es_data = pg_escape_bytea($data);
        fclose($img);

        $query = "Update users set username='$pName', surname='$pSurname', email='$pEmail', userPassword='$pPassword', address='$pAddress', city='$pCity', country='$pAddress', zip='$pZip', photo='{$es_data}' where id=$id";

        $result = pg_query($con, $query);
    }
    else
    {
        $query = "Update users set username='$pName', surname='$pSurname', email='$pEmail', userPassword='$pPassword', address='$pAddress', city='$pCity', country='$pAddress', zip='$pZip' where id=$id";

        $result = pg_query($con, $query);
    }

    if($result){
        echo "Data updated succesfully";
    }
    else{
        die(pg_last_error($con));
    }

    pg_close($con);
    //header("Location: profile.php");
        
}

?>



