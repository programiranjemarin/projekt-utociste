<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_GET['id']) && isset($_GET['idZivotinje'])) {
  $id = $_GET['id'];
  $idZivotinje = $_GET['idZivotinje'];
}

$sql = "DELETE FROM karton WHERE id = '$id';";

echo $sql, " ";

if (mysqli_query($con, $sql)) {
  $_SESSION['porukaozapisu'] = "Podaci uspješno izbrisani.";
} else {
  $_SESSION['porukaozapisu'] = "Pogreška prilikom brisanja: " . mysqli_error($con);
}

header("location: http://utocistezivotinja/zdravstvenikarton.php?id=$idZivotinje");

mysqli_close($con);
