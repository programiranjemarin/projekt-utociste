<?php
$con = mysqli_connect("localhost", "root", "", "utociste");
session_start();

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM zivotinja WHERE idZivotinje = $id";
  $sql2 = "SELECT * FROM karton WHERE idZivotinje = $id";
  $result = mysqli_query($con, $sql);
  $result2 = mysqli_query($con, $sql2);
}

?>

<!DOCTYPE html>
<html lang="hr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zdravstveni karton</title>
  <link rel="stylesheet" href="bodyheader.css">
  <link rel="stylesheet" href="zdravstvenikarton.css">
</head>

<body>
  <?php include "bodyheader.php";

  if (isset($_SESSION['poruka'])) {
    $pogresanId = $_SESSION['poruka'];
    unset($_SESSION['poruka']);
  }

  if (isset($_SESSION['porukaozapisu'])) {
    $porukaozapisu = $_SESSION['porukaozapisu'];
    unset($_SESSION['porukaozapisu']);
  }
  ?>

  <div class="kontejner-identifikacija">
    <div class="identifikacija">
      <form action="provjera.php" method="post">
        <label>ID životinje</label>
        <input type="text" name="id" required>
        <input type="submit" value="Potvrdi" style="cursor:pointer;">
      </form>
      <?php if (isset($pogresanId)) {
        echo "<p>$pogresanId</p>";
      }
      if (isset($porukaozapisu)) {
        echo "<p>$porukaozapisu</p>";
      }
      ?>
    </div>
  </div>

  <?php
  if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {

  ?>
      <div class="kontejner-zivotinja">
        <div class="slika-zivotinje">
          <img src="<?= $row["slika"] ?>" alt="slika">
        </div>
        <div class="ime-id-zivotinje">
          <p>Id životinje: <?= $row["idZivotinje"] ?> </p>
          <p>Ime životinje: <?= $row["ime"] ?></p>
          <p>Pasmina: <?= $row["pasmina"] ?></p>
          <a href="upisnovihpodataka.php?id=<?= urlencode($row['idZivotinje']) ?>">
            <input type="submit" value="Upiši nove podatke">
          </a>
        </div>

      </div>
  <?php }
  } ?>

  <div class="kontejner-prethodni-podaci">
    <table>
      <caption>
        <h2>Prethodni pregledi</h2>
      </caption>
      <tr>
        <th>Datum pregleda</th>
        <th>oib veterinarske ambulante</th>
        <th>opis pregleda</th>
        <th>idući datum pregleda</th>
      </tr>

      <?php if (isset($result2)) {
        while ($row2 = mysqli_fetch_assoc($result2)) { ?>
          <tr>
            <td><?= $row2['datumPregleda'] ?></td>
            <td><?= $row2['oibVetAmb'] ?></td>
            <td class="opis-pregleda"><?= $row2['opisPregleda'] ?></td>
            <td><?= $row2['iduciDatumPregleda'] ?></td>
            <td class="izmjeniobrisi hoveractive">
              <a href="izmjenapodataka.php?id=<?= $row2['id'] ?>&idZivotinje=<?= $row2['idZivotinje'] ?>&datumPregleda=<?= $row2['datumPregleda'] ?>&oibVetAmb=<?= $row2['oibVetAmb'] ?>&opisPregleda=<?= $row2['opisPregleda'] ?>&iduciDatumPregleda=<?= $row2['iduciDatumPregleda'] ?>">
                <input type="submit" value="Izmjeni">
              </a>
              <a href="izbriši.php?id=<?= $row2['id'] ?>&idZivotinje=<?= $row2['idZivotinje'] ?>">
                <input type="submit" value="Izbriši">
              </a>
            </td>
          </tr>
      <?php }
      } ?>
    </table>
  </div>



</body>

</html>

<?php
if (isset($result)) {
  mysqli_free_result($result);
}

if (isset($result2)) {
  mysqli_free_result($result2);
}

mysqli_close($con);

?>