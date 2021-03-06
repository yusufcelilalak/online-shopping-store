<?php
include "connect.php";
session_start();


if(isset($_SESSION['id'])){
  
  header("Location: profile.php");
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
    <link rel="stylesheet" href="css/shopping-card.css" />
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
              <a class="nav-link" href="#"
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
    
    <div class="log-in col-12 col-md-8 mx-auto row justify-content-between" style ="margin: 15vh auto;">
        <div class="col-10 col-sm-5 mx-auto my-5">
            <h3 class="info-title border-bottom border-2 p-1 mb-4">Log In</h3>
            <form action="login-functions.php" method="post" class="row g-3">
            <div class="col-sm-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
            </div>
            <div class="col-sm-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
            </div>
            <div class="col-12 text-center text-sm-end">
              <button
              type="submit"
              name="login"
              class="btn btn-outline-success"
            >
              Log In
            </button>
            </div>  
            </form>
        </div>
        <div class="col-10 col-sm-5 mx-auto my-5">
            <h3 class="info-title border-bottom border-2 p-1 mb-4">Sign Up</h3>
            <form action="signup-functions.php" method="post" class="row g-3">
              <div class="col-sm-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="inputName" required>
              </div>
              <div class="col-sm-6">
                <label for="inputSurname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="inputSurame" name="inputSurname" required>
              </div>
              <div class="col-sm-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
              </div>
              <div class="col-sm-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
              </div>
              <div class="col-12 text-center text-sm-end">
                <button type="submit" name="signup" class="btn btn-outline-success">Sign In</button>
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
  </body>
</html>
