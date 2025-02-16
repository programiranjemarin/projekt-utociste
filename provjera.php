<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

$id = mysqli_real_escape_string($con, $_POST["id"]);
$sql = "SELECT * FROM zivotinja WHERE idZivotinje = '$id'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  header("location: /zdravstvenikarton.php?id=$id");
} else {
  $_SESSION['poruka'] = "Nepostojeći id.";
  header("location: /zdravstvenikarton.php");
}

mysqli_free_result($result);
mysqli_close($con);
?>
