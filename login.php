<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bodyheader.css">
  <style>
    .login {
      background-color: darkslategray;
      margin-top: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px;
    }

    form input {
      display: block;
      margin: 15px 0;
      padding: 5px;
    }

    input[type="submit"] {
      margin-left: 60px;
      padding: 7px 15px;
    }
  </style>
</head>

<body>
  <?php include "bodyheader.php" ?>

  <div class="login">
    <form action="/">
      <label for="">Korisničko ime</label>
      <input type="text">
      <label for="">Lozinka</label>
      <input type="text">
      <input type="submit" value="Potvrdi">
    </form>
  </div>
</body>

</html>