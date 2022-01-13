<?php
include 'connect.php';

if(isset($_POST['submit'])){
  
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['tmp_name'];

  $img = fopen($fileName, 'r') or die("cannot read image\n");
  $data = fread($img, filesize($fileName));

  $es_data = pg_escape_bytea($data);
  fclose($img);

  $productname = $_POST["inputName"];
  $category = $_POST["inputCategory"];
  $size = $_POST["inputSize"];
  $price = $_POST["inputPrice"];
  $productdescription = $_POST["inputDescription"];
  
  $query = "INSERT INTO product(productname,category,size,price,productdescription,photo) VALUES('$productname','$category','$size',$price,'$productdescription','{$es_data}')";

  $result = pg_query($con, $query);

  if($result){
    echo "Data inserted succesfully";
  }
  else{
    die(pg_last_error($con));
  }

  pg_close($con);
  header("Location: admin.php");
}
?>