<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_POST['id']) && isset($_POST['idZivotinje']) && isset($_POST["datumPregleda"]) && isset($_POST["oibVetAmb"]) && isset($_POST["iduciDatumPregleda"]) && isset($_POST["opisPregleda"])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $idZivotinje = mysqli_real_escape_string($con, $_POST['idZivotinje']);
  $datumPregleda = mysqli_real_escape_string($con, $_POST['datumPregleda']);
  $oibVetAmb = mysqli_real_escape_string($con, $_POST['oibVetAmb']);
  $iduciDatumPregleda = mysqli_real_escape_string($con, $_POST['iduciDatumPregleda']);
  $opisPregleda = mysqli_real_escape_string($con, $_POST['opisPregleda']);

  $sql = "UPDATE karton SET datumPregleda = '$datumPregleda', oibVetAmb = '$oibVetAmb', iduciDatumPregleda = '$iduciDatumPregleda', opisPregleda = '$opisPregleda' WHERE id='$id'";

  if (mysqli_query($con, $sql)) {
    $_SESSION['porukaozapisu'] = "Podaci uspješno izmjenjeni.";
  } else {
    $_SESSION['porukaozapisu'] = "Pogreška prilikom zapisivanja: " . mysqli_error($con);
  }

  header("location: /zdravstvenikarton.php?id=$idZivotinje");
} else {
  $_SESSION['poruka'] = "Nedostaju potrebne informacije.";
  header("location: /zdravstvenikarton.php");
}

mysqli_close($con);