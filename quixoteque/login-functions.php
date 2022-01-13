<?php
include "connect.php";

session_start();

if(isset($_POST['login'])){
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];

    $query = "Select userpassword from users where email='$email'";
    $result = pg_query($con, $query);
    $userPassword=pg_fetch_result($result, 'userpassword');

    $query = "Select usertype from users where email='$email'";
    $result = pg_query($con, $query);
    $userType=pg_fetch_result($result, 'usertype');

    $query = "Select id from users where email='$email'";
    $result = pg_query($con, $query);
    $id=pg_fetch_result($result, 'id');


    if($result){
        if($password==$userPassword && $password !="" && $userType == "admin")
        {
            $_SESSION["id"]=$id;
            header("Location: admin.php");
        }
        else if($password==$userPassword && $password !="" && $userType == "user")
        {
            $_SESSION["id"]=$id;
            header("Location: profile.php");
        }
        else
        {
            header("Location: sign-up.php");
        }
        pg_close($con);
    }
    else{
        die(pg_last_error($con));
    }

}



?>