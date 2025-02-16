<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_GET['id']) && isset($_GET['idZivotinje']) && isset($_GET['datumPregleda']) &&  isset($_GET['oibVetAmb']) &&  isset($_GET['iduciDatumPregleda']) && isset($_GET['opisPregleda'])) {
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $idZivotinje = mysqli_real_escape_string($con, $_GET['idZivotinje']);
  $datumPregleda = mysqli_real_escape_string($con, $_GET['datumPregleda']);
  $oibVetAmb = mysqli_real_escape_string($con, $_GET['oibVetAmb']);
  $iduciDatumPregleda = mysqli_real_escape_string($con, $_GET['iduciDatumPregleda']);
  $opisPregleda = mysqli_real_escape_string($con, $_GET['opisPregleda']);
} else {
  $_SESSION['poruka'] = "Nedostaju potrebne informacije.";
  header("location: /zdravstvenikarton.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Izmjena podataka</title>
  <link rel="stylesheet" href="bodyheader.css">
  <style>
    .forma {
      margin-top: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    form {
      background-color: darkslategray;
      padding: 30px;
    }

    label {
      padding: 0 10px;
    }

    input,
    textarea {
      display: block;
      margin: 10px;
      padding: 10px;
    }

    textarea {
      width: 500px;
      height: 300px;
    }
  </style>
</head>

<body>
  <?php include "bodyheader.php"; ?>

  <div class="forma">
    <form action="izmjeni.php" method="post">
      <label for="">Datum pregleda</label>
      <input type="text" name="datumPregleda" placeholder="datum pregleda" value="<?= $datumPregleda ?>" required>
      <label for="">Oib Veterinarske ambulante</label>
      <input type="text" name="oibVetAmb" placeholder="oib veterinarske ambulante" value="<?= $oibVetAmb ?>" required>
      <label for="">Idući datum pregleda</label>
      <input type="text" name="iduciDatumPregleda" placeholder="iduci datum pregleda" value="<?= $iduciDatumPregleda ?>" required>
      <label for="">Opis Pregleda</label>
      <textarea name="opisPregleda" placeholder="opis pregleda" required><?= $opisPregleda ?></textarea>
      <input type="submit" value="Potvrdi">
      <input type="hidden" name="id" value="<?= $id ?>">
      <input type="hidden" name="idZivotinje" value="<?= $idZivotinje ?>">
    </form>
  </div>
</body>

</html>