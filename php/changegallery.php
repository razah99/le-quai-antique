<?php
session_start();

if (isset($_POST['submit'])) {
    $targetDir = "../gallery/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Vérifier si le fichier image est une véritable image ou une fausse image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($targetFile)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Limiter la taille du fichier
    if ($_FILES["file"]["size"] > 10000000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Autoriser uniquement certains formats d'image
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'JPG' , 'JPEG', 'PNG', 'GIF');
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas pu être téléchargé.";
    } else {
        // Si tout est correct, essayer de télécharger le fichier
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "Le fichier " . basename($_FILES["file"]["name"]) . " a été téléchargé avec succès.";
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Chemin vers le dossier des images
    $cheminImages = '../gallery/';

    // Vérifier si le paramètre 'image' est défini
    if (isset($_POST['image'])) {
        $image = $_POST['image'];

        // Vérifier si le fichier image existe
        if (file_exists($cheminImages . $image)) {
            // Supprimer le fichier
            unlink($cheminImages . $image);
            echo 'L\'image a été supprimée avec succès.';
        } else {
            echo 'L\'image n\'existe pas.';
        }
    }
}


include 'headerAdmin.php';
?>

<div class="d-flex justify-content-center mx-auto p-5">
    <a href="admin.php"><button type="button" class="btn btn-outline-danger text-center">Retourner à votre espace</button>
    </a>
</div>
<section class="formulaire d-flex flex-column align-items-center p-5">
    <h3>Pour insérer une image:</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Télécharger">
    </form>
</section>

<h3 class="text-center">Images de la galerie:</h3>
<section class="afficheImages d-flex justify-content-center">
    <?php
    // Chemin vers le dossier des images
    $cheminImages = '../gallery/';

    // Obtention de la liste des fichiers d'images dans le dossier
    $images = glob($cheminImages . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);

    // Parcours et affichage des images
    foreach ($images as $image) {
        echo '<div>';
        echo '<a href="' . $image . '" target="_blank">';
        echo '<img src="' . $image . '" alt="afficheImages" style="width: 150px; height: 150px; margin: 10px;">';
        echo '</a>';
        echo '<form method="post" action="changegallery.php">';
        echo '<input type="hidden" name="image" value="' . basename($image) . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';
        echo '</div>';
    }
    ?>

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>