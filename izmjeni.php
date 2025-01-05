<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();



if (isset($_POST['id']) && isset($_POST['idZivotinje']) && isset($_POST["datumPregleda"]) && isset($_POST["oibVetAmb"]) && isset($_POST["iduciDatumPregleda"]) && isset($_POST["opisPregleda"])) {

  $id = $_POST['id'];
  $idZivotinje = $_POST['idZivotinje'];
  $datumPregleda = $_POST['datumPregleda'];
  $oibVetAmb = $_POST['oibVetAmb'];
  $iduciDatumPregleda = $_POST['iduciDatumPregleda'];
  $opisPregleda = $_POST['opisPregleda'];

  echo $id , " ", $datumPregleda, " ", $oibVetAmb, " ", $iduciDatumPregleda, " ", $opisPregleda;

  $sql = "UPDATE karton SET datumPregleda = '$datumPregleda', oibVetAmb = '$oibVetAmb', iduciDatumPregleda = '$iduciDatumPregleda', opisPregleda = '$opisPregleda' WHERE id='$id'";

  echo $sql;

   if (mysqli_query($con, $sql)) {
     $_SESSION['porukaozapisu'] = "Podaci uspješno izmjenjeni.";
   } else {
     $_SESSION['porukaozapisu'] = "Pogreška prilikom zapisivanja: " . mysqli_error($con);
   }
}

header("location: http://utocistezivotinja/zdravstvenikarton.php?id=$idZivotinje");
mysqli_close($con);
