<?php
$idzivotinje = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unos novih podataka</title>
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
    <form action="upis.php" method="post">
      <label for="">Datum pregleda</label>
      <input type="text" name="datumPregleda" placeholder="datum pregleda" required>
      <label for="">Oib Veterinarske ambulante</label>
      <input type="text" name="oibVetAmb" placeholder="oib veterinarske ambulante" required>
      <label for="">Idući datum pregleda</label>
      <input type="text" name="iduciDatumPregleda" placeholder="iduci datum pregleda" required>
      <label for="">Opis Pregleda</label>
      <textarea name="opisPregleda" placeholder="opis pregleda" required></textarea>
      <input type="submit" value="Potvrdi">
      <input type="hidden" name="idZivotinje" value="<?= $idzivotinje ?>">
    </form>
  </div>
</body>

</html>