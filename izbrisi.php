<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_GET['id']) && isset($_GET['idZivotinje'])) {
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $idZivotinje = mysqli_real_escape_string($con, $_GET['idZivotinje']);

  $sql = "DELETE FROM karton WHERE id = '$id';";

  if (mysqli_query($con, $sql)) {
    $_SESSION['porukaozapisu'] = "Podaci uspješno izbrisani.";
  } else {
    $_SESSION['porukaozapisu'] = "Pogreška prilikom brisanja: " . mysqli_error($con);
  }

  header("location: /zdravstvenikarton.php?id=$idZivotinje");
} else {
  $_SESSION['poruka'] = "Nedostaju potrebne informacije.";
  header("location: /zdravstvenikarton.php");
}

mysqli_close($con);