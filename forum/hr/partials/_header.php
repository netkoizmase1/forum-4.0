<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dokument</title>

    <!-- Obavezni meta tagovi -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    

</head>
<body>
  

<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum/hr/indexhr.php">OpenSesame</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum/hr/indexhr.php">Početna <span class="sr-only">(trenutačno)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">O nama</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top kategorije
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
      $result = mysqli_query($conn, $sql); 
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid='. $row['category_id']. '">' . $row['category_name']. '</a>'; 
      }
        
      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php" >Kontakt</a>
    </li>
  </ul>
  <div class="row mx-2">';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" actiion="search.php" placeholder="Pretraži" aria-label="Pretraži">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Pretraži</button>
      <p class="text-light my-0 mx-2">Dobrodošli '. $_SESSION['username']. ' </p>
      <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Odjava</a>
      </form>';
}
else{ 
  echo '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Pretraži" aria-label="Pretraži">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Pretraži</button>
    </form>
    <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Prijava</button>
    <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Registracija</button>';
  }


  echo '</div>
      </div>
      </nav>'; 

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Uspjeh!</strong> Možete se sada prijaviti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Zatvori">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>

    <!-- Opcionalni JavaScript -->
    <!-- jQuery prvo, zatim Popper.js, pa Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</body>
</html>
