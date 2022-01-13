<?php
include "connect.php";
if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $query="Delete From product where id=$id";
    $result=pg_query($con, $query);
    
    if($result){
        header('location:admin.php');
    }else{
        die(pg_last_error($con));
    }
}


?>
