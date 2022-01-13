<?php
include "connect.php";

$id=$_GET['updateid'];
$query = "Select * from product where id=$id";
$result = pg_query($con, $query);
$row=pg_fetch_assoc($result);

$imageQuery= "Select photo From product Where id='$id'";
$res = pg_query($con, $imageQuery) or die (pg_last_error($con)); 
$data = pg_fetch_result($res, 'photo');
$unes_image = pg_unescape_bytea($data);
$base64_image = base64_encode($unes_image);


$pName=$row['productname'];
$pCategory=$row['category'];
$pSize=$row['size'];
$pPrice=$row['price'];
$pDescription=$row['productdescription'];

if(isset($_POST['submit'])){

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['tmp_name'];
    
    if($fileName!="")
    {
        $img = fopen($fileName, 'r') or die("cannot read image\n");
        $data = fread($img, filesize($fileName));
        $es_data = pg_escape_bytea($data);
        fclose($img);
    }
    else
    {
        $es_data = $data;
    }
    
    

    $productname = $_POST["inputName"];
    $category = $_POST["inputCategory"];
    $size = $_POST["inputSize"];
    $price = $_POST["inputPrice"];
    $productdescription = $_POST["inputDescription"];
    
    $query = "Update product set productname='$productname', category='$category', size='$size', price=$price, productdescription='$productdescription', photo='{$es_data}' where id=$id";

    $result = pg_query($con, $query);

    if($result){
        echo "Data updated succesfully";
    }
    else{
        die(pg_last_error($con));
    }

    pg_close($con);
    header("Location: admin.php");
    
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="icon" type="image/png" href="img/logo.png" />
    <title>Quixoteque</title>
  </head>
  <body>
    <nav
      class="navbar shadow-sm sticky-top navbar-expand-lg navbar-light bg-light"
    >
      <div class="container-xxl my-2">
        <a class="navbar-brand" href="index.html">
          <img src="img/logo.png" alt="" width="60" height="60" />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main-nav"
          aria-controls="#main-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-center" id="main-nav">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="new-clothes.html">New Clothes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="women-clothes.html">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="men-clothes.html">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="children-clothes.html">Children</a>
            </li>
          </ul>

          <div class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </div>

          <ul class="navbar-nav ms-2">
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="bi bi-person fa-4x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopping-card.html"
                ><i class="bi bi-bag fa-4x"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <form method="post" action="" enctype="multipart/form-data" class="row g-3">
        <div
          class="container-fluid row product-container justify-content-evenly"
        >
          <div class="product-photo col-md-4 text-center my-auto">
            <img
              id="main-product-photo"
              src=<?php echo 'data:image/png;base64,'.$base64_image.''?>
              alt="product photo"
            />
            <div class="image-button">
              <input type="file" name="file" id="mainProductFile" source="src=<?php echo 'data:image/png;base64,'.$base64_image.''?>" class="file" />
              <label
                class="shadow-sm border border-2 w-m-50 m-auto mt-3 mb-3"
                for="mainProductFile"
                id="mainUploadBtn"
                >Choose a file</label
              >
            </div>
          </div>
          <div class="informations col-md-4 mt-4 mb-5 row">
            <h3 class="info-title border-bottom border-2 p-1 mb-4 mt-5 mt-md-0">
              Product Information
            </h3>
            <div class="col-sm-6">
              <label for="inputName" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="inputName"
                name="inputName"
                value=<?php echo $pName;?>
                required/>
            </div>
            <div class="col-sm-6">
              <label for="inputCategory" class="form-label">Category</label>
              <input
                type="text"
                class="form-control"
                name="inputCategory"
                id="inputCategory"
                value=<?php echo $pCategory;?>
                required
              />
            </div>
            <div class="col-sm-6">
              <label for="inputSize" class="form-label">Size</label>
              <input
                type="text"
                class="form-control"
                name="inputSize"
                id="inputSize"
                value=<?php echo $pSize;?>
                required
              />
            </div>
            <div class="col-sm-6">
              <label for="inputPrice" class="form-label">Price</label>
              <input
                type="number"
                class="form-control"
                id="inputPrice"
                name="inputPrice"
                value=<?php echo $pPrice;?>
                required
              />
            </div>
            <div class="col-12">
              <label for="inputDescription" class="form-label">Description</label>
              <textarea
                class="form-control"
                id="inputDescription"
                name="inputDescription"
                rows="4"
                required
              ><?php echo $pDescription;?></textarea>
            </div>
            <div class="col-12 text-center text-sm-end my-4">
              <button
                type="submit"
                name="submit"
                id="submit"
                class="btn btn-primary"
              >
                Edit
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="footer-container container mt-5">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-top border-2 py-3 mb-3">
          <li class="nav-item">
            <a href="index.html" class="footer-link nav-link px-2 text-muted"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted"
              >About Us</a
            >
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted">FAQs</a>
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted"
              >Contacts</a
            >
          </li>
        </ul>
        <p class="footer-text text-center text-muted">&copy; 2021 Quixoteque</p>
      </footer>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="javascript/admin.js"></script>
  </body>
</html>
