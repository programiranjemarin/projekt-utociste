<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if(isset($_POST['idZivotinje'])){
  $idZivotinje = mysqli_real_escape_string($con,$_POST['idZivotinje']);
} else{
  $_SESSION['poruka'] = "Nema id-a životinje.";
  header("location: /zdravstvenikarton.php");
  exit();
}

if (isset($_POST["datumPregleda"]) && isset($_POST["oibVetAmb"]) && isset($_POST["iduciDatumPregleda"]) && isset($_POST["opisPregleda"])) {

  $datumPregleda = mysqli_real_escape_string($con, $_POST["datumPregleda"]);
  $oibVetAmb = mysqli_real_escape_string($con, $_POST["oibVetAmb"]);
  $iduciDatumPregleda = mysqli_real_escape_string($con, $_POST["iduciDatumPregleda"]);
  $opisPregleda = mysqli_real_escape_string($con, $_POST["opisPregleda"]);

  $sql = "INSERT INTO karton (datumPregleda, oibVetAmb, iduciDatumPregleda, opisPregleda, idZivotinje) 
  VALUES ('$datumPregleda', '$oibVetAmb', '$iduciDatumPregleda', '$opisPregleda', '$idZivotinje')";

  if (mysqli_query($con, $sql)) {
    $_SESSION['porukaozapisu'] = "Uspješno zapisano.";
  } else {
    $_SESSION['porukaozapisu'] = "Pogreška prilikom zapisivanja: " . mysqli_error($con);
  }
}

header("location: /zdravstvenikarton.php?id=$idZivotinje");
mysqli_close($con);
