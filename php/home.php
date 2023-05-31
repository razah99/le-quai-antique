<?php
include 'connect.php';

$recup1 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 1");
$recup2 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 2");
$recup3 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 3");

$Menu1 = mysqli_fetch_assoc($recup1);
$Menu2 = mysqli_fetch_assoc($recup2);
$Menu3 = mysqli_fetch_assoc($recup3);

$mysqli->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Acceuil</title>
</head>
<body>
    
</body>
</html>
<main class="main">
    <section class="header">
        <img src="img/chef.jpg" class="firstImage img-fluid" alt="chef">
        <div class="d-flex justify-content-center bg-body-secondary p-2 w-100">
            <img src="img/facebook.svg" class="rounded m-2" alt="facebook">
            <img src="img/twitter.svg" class="rounded m-2" alt="twitter">
            <img src="img/instagram.svg" class="rounded m-2" alt="instagram">
        </div><br>
    </section>

    <section class="content mx-auto">
        <article>
            <h5 class="firstTitle text-center w-50 mx-auto bg-warning-subtle">LES DERNIÈRES CRÉATION DU CHEF</h5><br>
            <p class="text-center w-75 mx-auto">Le savoir-faire d'Arnaud Michant se reflète dans chacun de ses plats, où il marie subtilement les saveurs et les textures pour créer des expériences gustatives inoubliables. Sa cuisine créative et inventive est à la fois respectueuse des traditions culinaires locales et ouverte à de nouvelles influences.<br>
                Chaque assiette est un hommage à la richesse et à la diversité de la gastronomie savoyarde. Que ce soit à travers ses plats signature ou ses créations saisonnières, le chef parvient à émerveiller les papilles de ses convives tout en les invitant à découvrir la passion qui l'anime</p><br>
        </article>
        <div class="d-flex flex-row flex-wrap justify-content-around">
            <?php
            // Chemin vers le dossier des images
            $cheminImages = 'gallery/';

            // Obtention de la liste des fichiers d'images dans le dossier
            $images = glob($cheminImages . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE); 

            // Parcours des images et affichage des miniatures
            foreach ($images as $image) : ?>
            <?php $info = pathinfo($image);
            $imageName = basename($image, '.'.$info['extension']); ?>
                <div class="image-container p-2">
                        <img src="<?= $image; ?>" alt="Image" class="gallery">
                    <div class="image-title"><?= $imageName;?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto mt-5">
            <a href="php/reservation.php" class="btn btn-warning shadow p-3 mb-5" type="button">RÉSERVER</a>
        </div>
        <hr class="border border-dark border-2 opacity-50 w-75 mx-auto">
        <h3 class="text-center m-5">NOS MENUS</h3>
        <div class="d-flex flex-row flex-wrap">
            <div class="col-sm-4 mb-3 mb-sm-0 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu1["titre"] ?><br><?= $Menu1["prix"] ?> €</h5>
                        <p class="card-text"><?= $Menu1["desc"] ?></p>
                        <a href="php/reservation.php" class="btn btn-dark shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu2["titre"] ?><br><?= $Menu2["prix"] ?> €</h5>
                        <p class="card-text"><?= $Menu2["desc"] ?></p><br>
                        <a href="php/reservation.php" class="btn btn-dark shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu3["titre"] ?><br><?= $Menu3["prix"] ?> €</h5>
                        <p class="card-text"><?= $Menu3["desc"] ?></p><br>
                        <a href="php/reservation.php" class="btn btn-dark shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>