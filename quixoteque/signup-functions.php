<?php
include "connect.php";

if(isset($_POST['signup'])){

    $name = $_POST["inputName"];
    $surname = $_POST["inputSurname"];
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];

    $query = "INSERT INTO users(username,surname,email,userpassword,usertype) VALUES('$name','$surname','$email','$password','user')";

    $result = pg_query($con, $query);

    if($result){
        header("Location: profile.php");
    }
    else{
        die(pg_last_error($con));
    }
}



?>