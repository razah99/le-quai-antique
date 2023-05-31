<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Faustina:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <title>Le quai antique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="../js/admin.js" defer></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand ms-3 text-warning" href="../index.php"><p class="logo">Quai Antique</p></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Carte
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="menu.php">Entrées</a></li>
              <li><a class="dropdown-item" href="menu.php">Plats</a></li>
              <li><a class="dropdown-item" href="menu.php">Desserts</a></li>
              <li><a class="dropdown-item" href="menu.php">Vins</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#hourly">Horaires</a>
          </li>
        </ul>
      <?php if (isset($_SESSION['mail'])): ?>
          <p class="d-flex m-2">Bienvenue <?= $_SESSION['mail'] ?></p>
          <div class="btn-group m-2" role="group" aria-label="Basic mixed styles example">
            <a href="member.php" type="button" class="btn bg-body-tertiary shadow-sm">Mon compte</a>
            <a href="deconnexion.php" type="button" class="btn bg-dark-subtle shadow-sm">Déconnexion</a>
          <?php else : ?>
            <div class="btn-group m-2" role="group" aria-label="Basic mixed styles example">
              <a href="connexion.php" type="button" class="btn bg-body-tertiary shadow-sm">Connexion</a>
              <a href="inscription.php" type="button" class="btn bg-dark-subtle shadow-sm">Inscription</a>
            </div>
          <?php endif; ?>
          </div>
      </div>
  </nav>