<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_POST["datumPregleda"]) && isset($_POST["oibVetAmb"]) && isset($_POST["iduciDatumPregleda"]) && isset($_POST["opisPregleda"])) {


  $sql = "INSERT INTO karton (datumPregleda, oibVetAmb, iduciDatumPregleda, opisPregleda, idZivotinje) 
  VALUES ('" . $_POST['datumPregleda'] . "', '" . $_POST['oibVetAmb'] . "', '" . $_POST['iduciDatumPregleda'] . "', '" . $_POST['opisPregleda'] . "' , '" . $_POST['idZivotinje'] . "')";

  if (mysqli_query($con, $sql)) {
    $_SESSION['porukaozapisu'] = "Uspješno zapisano.";
  } else {
    $_SESSION['porukaozapisu'] = "Pogreška prilikom zapisivanja: " . mysqli_error($con);
  }
}

$idZivotinje = $_POST['idZivotinje'];
header("location: http://utocistezivotinja/zdravstvenikarton.php?id=$idZivotinje");
mysqli_close($con);
