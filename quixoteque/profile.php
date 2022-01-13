<?php
include "connect.php";
session_start();

$name = "";
$surname = "";
$email = "";
$password = "";
$address = "";
$city = "";
$country = "";
$zip = "";



if(isset($_SESSION['id'])){

  $id = $_SESSION['id'];

  $query = "Select * from users where id=$id";
  $result = pg_query($con, $query);
  $row=pg_fetch_assoc($result);

  $name = $row['username'];
  $surname = $row['surname'];
  $email = $row['email'];
  $password = $row['userpassword'];
  $address = $row['address'];
  $city = $row['city'];
  $country = $row['country'];
  $zip = $row['zip'];
  $photo = $row['photo'];

  $imageQuery= "Select photo From users Where id='$id'";
  $res = pg_query($con, $imageQuery) or die (pg_last_error($con)); 
  $data = pg_fetch_result($res, 'photo');
  $unes_image = pg_unescape_bytea($data);
  $base64_image = base64_encode($unes_image);
  

  if($photo!=""){
    $unes_image = pg_unescape_bytea($photo);
    $base64_image = base64_encode($unes_image);
    $photo = "data:image/png;base64, $base64_image";
  }
  else{
    $photo = "img/upload-image.png";
  }
}
else
{
  header("Location: index.html");
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
    <link rel="stylesheet" href="css/profile.css" />
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

          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>

          <ul class="navbar-nav ms-2">
            <li class="nav-item">
              <a class="nav-link" href="sign-up.php"
                ><i class="bi bi-person fa-4x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopping-card.html"><i class="bi bi-bag fa-4x"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clear-session.php"><i class="bi bi-box-arrow-right fa-4x"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
        
    <div class="container-fluid profile-container">
      <div class="profile-section row justify-content-evenly
      mt-4">
        <form class="row justify-content-evenly" method="post" action="edit-profile.php" enctype="multipart/form-data">
          <div class="profile-photo col-md-4 text-center">
              <img id="main-profile-photo" src="<?php echo $photo; ?>" class="rounded-circle" alt="profile photo">

              <div class="image-button">
                <input type="file" name="file" id="mainProfileFile" class="file"/>
                <label
                  class="shadow-sm border border-2 w-m-50 m-auto mt-3 mb-3"
                  for="mainProfileFile"
                  id="mainUploadBtn"
                  >Choose a file</label
                >
              </div>
          </div>
          <div class="profile-info row g-2 col-md-4">
            <h3 class="info-title border-bottom border-2 p-1 mb-4">Profile Information</h3>
            <div class="col-sm-6">
              <label for="inputName" class="form-label">Name</label>
              <input type="text" class="form-control" id="inputName" name="inputName"  value=<?php echo $name;?> required>
            </div>
            <div class="col-sm-6">
              <label for="inputSurname" class="form-label">Surname</label>
              <input type="text" class="form-control" id="inputSurname" name="inputSurname" value=<?php echo $surname;?> required>
            </div>
            <div class="col-sm-12">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@gmail.com" value=<?php echo $email;?> required>
            </div>
            <div class="col-sm-12">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword" name="inputPassword" value=<?php echo $password;?> required>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St" value=<?php echo $address;?>>
            </div>
            <div class="col-sm-5">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" class="form-control" id="inputCity" name="inputCity" value=<?php echo $city;?>>
            </div>
            <div class="col-sm-4">
              <label for="inputCountry" class="form-label">Country</label>
              <input type="text" class="form-control" id="inputCountry" name="inputCountry" value=<?php echo $country;?>>
            </div>
            <div class="col-sm-3">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip" name="inputZip" value=<?php echo $zip;?>>
            </div>
            <div class="col-12 text-center text-sm-end">
              <button type="submit" name="submit" value="edit" class="btn btn-primary">Edit</button>
            </div>  
            <h3 class="info-title border-bottom border-2 p-1 mt-5 mb-4">Card Information</h3>
            <div class="col-md-12">
              <label for="name" class="form-label">Name</label>
              <input class="form-control" id="name" type="text" placeholder="Enter your name">
            </div>
            <div class="col-md-12">
              <label for="ccnumber" class="form-label">Credit Card Number</label>
              <div class="input-group mb-3">
                <input class="form-control" id="ccnumber" type="text" placeholder="0000 0000 0000 0000">
                <span class="input-group-text">
                  <i class="bi bi-credit-card"></i>
                </span>
              </div>
            </div>
            <div class="col-sm-4">
              <label for="month" class="form-label">Month</label>
              <select class="form-control" id="month">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="year" class="form-label">Year</label>
              <select class="form-control" id="year">
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="cvv" class="form-label">CVV</label>
              <input class="form-control" id="cvv" type="text" placeholder="123">
            </div>
          
            <div class="col-12 text-center text-sm-end">
                  <button type="button" class="btn btn-primary" type="submit" name="addCard">Edit</button>
            </div>  
          </div>
        </form>
      </div>
    </div>


    <div class="footer-container container mt-5">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-top border-2 py-3 mb-3">
          <li class="nav-item">
            <a href="index.html" class="footer-link nav-link px-2 text-muted">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted">FAQs</a>
          </li>
          <li class="nav-item">
            <a href="#" class="footer-link nav-link px-2 text-muted">Contacts</a>
          </li>
        </ul>
        <p class="footer-text text-center text-muted">&copy; 2021 Quixoteque</p>
      </footer>
    </div>

    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="javascript/profile.js"></script>
  </body>
</html>
