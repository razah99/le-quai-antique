<?php
include 'headerAdmin.php';
include 'connect.php';

if (isset($_POST['entree'])) {

    $titre = ($_POST['titre']);
    $detail = ($_POST['detail']);
    $prix = ($_POST['prix']);

    $entrees = mysqli_query($mysqli, "INSERT INTO entrees (titre, detail, prix) VALUES ('$titre','$detail', '$prix')");
    if ($entrees === TRUE) : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La ligne a été ajoutée avec succès.</button></div>
    <?php else : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-danger">Une erreur s'est produite.</button></div>
        <?= ' ' . $mysqli->error; ?>
<?php endif;
}

if (isset($_POST['plat'])) {

    $titre1 = ($_POST['titre1']);
    $detail1 = ($_POST['detail1']);
    $prix1 = ($_POST['prix1']);

    $plats = mysqli_query($mysqli, "INSERT INTO plats (titre, detail, prix) VALUES ('$titre1','$detail1', '$prix1')");
    if ($plats === TRUE) : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La ligne a été ajoutée avec succès.</button></div>
    <?php else : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-danger">Une erreur s'est produite.</button></div>
        <?= ' ' . $mysqli->error; ?>
<?php endif;
}

if (isset($_POST['dessert'])) {

    $titre2 = ($_POST['titre2']);
    $detail2 = ($_POST['detail2']);
    $prix2 = ($_POST['prix2']);

    $desserts = mysqli_query($mysqli, "INSERT INTO desserts (titre, detail, prix) VALUES ('$titre2','$detail2', '$prix2')");
    if ($desserts === TRUE) : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La ligne a été ajoutée avec succès.</button></div>
    <?php else : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-danger">Une erreur s'est produite.</button></div>
        <?= ' ' . $mysqli->error; ?>
<?php endif;
}

if (isset($_POST['vin'])) {

    $titre3 = ($_POST['titre3']);
    $detail3 = ($_POST['detail3']);
    $prix3 = ($_POST['prix3']);

    $vins = mysqli_query($mysqli, "INSERT INTO vins (titre, detail, prix) VALUES ('$titre3','$detail3', '$prix3')");
    if ($vins === TRUE) : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La ligne a été ajoutée avec succès.</button></div>
    <?php else : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-danger">Une erreur s'est produite.</button></div>
        <?= ' ' . $mysqli->error; ?>
<?php endif;
}
?>


<?php



if (isset($_POST['supprimer'])) {
    // Récupérer le titre renseigné dans le formulaire
    $titre = $_POST['titre'];
    // Échapper les caractères spéciaux dans le titre pour éviter les injections SQL
    $titre = $mysqli->real_escape_string($titre);

    // Requête de suppression
    $sql1 = mysqli_query($mysqli, "DELETE FROM entrees WHERE titre = '$titre'");
    $sql2 = mysqli_query($mysqli, "DELETE FROM plats WHERE titre = '$titre'");
    $sql3 = mysqli_query($mysqli, "DELETE FROM desserts WHERE titre = '$titre'");
    $sql4 = mysqli_query($mysqli, "DELETE FROM vins WHERE titre = '$titre'");
?>
    <?php if (($sql1 === TRUE) || ($sql2 === TRUE) || ($sql3 === TRUE) || ($sql4 === TRUE)) : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La ligne a été supprimée avec succès.</button></div>
    <?php else : ?>
        <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-danger">Une erreur s'est produite.</button></div>
        <?= ' ' . $mysqli->error; ?>
<?php endif;
}
?>

<div class="d-flex justify-content-center mx-auto p-5">
    <a href="admin.php"><button type="button" class="btn btn-outline-danger text-center">Retourner à votre espace</button>
    </a>
</div>
<section class="d-flex flex-row flex-wrap justify-content-center">
    <div class="d-flex flex-column p-5">
        <h3 class="text-center p-2">Ajouter une entrée:</h3>
        <form action="" name="add" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titre</span>
                <input type="text" name="titre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Description</span>
                <input type="text" name="detail" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Prix</span>
                <input type="text" name="prix" class="form-control" placeholder="€" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-12">
                <button class="btn btn-outline-success" type="submit" name="entree">Ajouter</button>
            </div>
        </form>
    </div>

    <div class="d-flex flex-column p-5">
        <h3 class="text-center p-2">Ajouter un plat:</h3>
        <form action="" name="add" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titre</span>
                <input type="text" name="titre1" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Description</span>
                <input type="text" name="detail1" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Prix</span>
                <input type="text" name="prix1" class="form-control" placeholder="€" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-12">
                <button class="btn btn-outline-success" type="submit" name="plat">Ajouter</button>
            </div>
        </form>
    </div>

    <div class="d-flex flex-column p-5">
        <h3 class="text-center p-2">Ajouter un dessert:</h3>
        <form action="" name="add" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titre</span>
                <input type="text" name="titre☻2" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Description</span>
                <input type="text" name="detail☻2" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Prix</span>
                <input type="text" name="prix☻2" class="form-control" placeholder="€" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-12">
                <button class="btn btn-outline-success" type="submit" name="dessert">Ajouter</button>
            </div>
</section>

<section class="d-flex flex-row flex-wrap justify-content-center">

            <div class="d-flex flex-column p-5">
                <h3 class="text-center p-2">Ajouter du vin:</h3>
                <form action="" name="add" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Titre</span>
                        <input type="text" name="titre3" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                        <input type="text" name="detail3" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Prix</span>
                        <input type="text" name="prix3" class="form-control" placeholder="€" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-outline-success" type="submit" name="vin">Ajouter</button>
                    </div>
                </form>
            </div>

        </form>
    </div>

    <div class="d-flex flex-column p-5">
        <h3 class="text-center p-2">Supprimer (entrée, plat, dessert, vin)</h3>
        <p class="text-center">(Entrez un titre)</p>
        <form action="" name="suppr" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Titre</span>
                <input type="text" name="titre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-12">
                <button class="btn btn-outline-danger" type="submit" name="supprimer">Supprimer</button>
            </div>
        </form>
    </div>
</section>
<hr>
<h3 class="text-center p-5">Voir la carte</h3>
<?php
include 'connect.php';

$rE = mysqli_query($mysqli, "SELECT * FROM entrees");
$rP = mysqli_query($mysqli, "SELECT * FROM plats");
$rD = mysqli_query($mysqli, "SELECT * FROM desserts");
$rV = mysqli_query($mysqli, "SELECT * FROM vins");

?>
<section class="menu d-flex flex-column justify-content-center align-items-center p-2" style="text-align: center;">
  <div class="d-flex flex-column flex-nowrap p-4">
    <h5 class="m-2 fst-italic text-decoration-underline text-warning">ENTRÉES</h5>
    <?php
    foreach ($rE as $rowE) {
    ?>
      <table class="table d-flex flex_column">
        <tbody>
          <tr>
            <td class="text-center">
              <h5> <?= $rowE['titre'] ?> </h5>
            </td>
          </tr>
          <tr>
            <td class="text-center"> <?= $rowE['detail'] ?> </td>
          </tr>
          <tr>
            <td class="text-center"> <?= $rowE['prix'] ?>€ </td>
          </tr>
        </tbody>
      </table>

    <?php
    }
    ?>

    <h5 class="m-2 mt-5 fst-italic text-decoration-underline text-warning">PLATS</h5>
    <?php
    foreach ($rP as $rowP) {
    ?>
      <table class="table">
        <tbody>
          <tr>
            <td class="text-center">
              <h5><?= $rowP['titre'] ?></h5>
            </td>
          </tr>
          <tr>
            <td class="text-center"><?= $rowP['detail'] ?></td>
          </tr>
          <tr>
            <td class="text-center"><?= $rowP['prix'] ?>€</td>
          </tr>
        </tbody>
      </table>


    <?php
    }
    ?>
  </div>
  <div class="d-flex flex-column flex-nowrap ">
    <h5 class="m-2 mt-5 fst-italic text-decoration-underline text-warning">DESSERTS</h5>
    <?php
    foreach ($rD as $rowD) {
    ?>
      <table class="table">
        <tbody>
          <tr>
            <td class="text-center">
              <h5><?= $rowD['titre'] ?></h5>
            </td>
    </tr>
          <tr>
            <td class="text-center"><?= $rowD['detail'] ?></td>
          </tr>
          <tr>
            <td class="text-center"><?= $rowD['prix'] ?>€</td>
          </tr>
        </tbody>
      </table>

    <?php
    }
    ?>

    <h5 class="m-2 mt-5 fst-italic text-decoration-underline text-warning">VINS</h5>
    <?php
    foreach ($rV as $rowV) {
    ?>
      <table class="table">
        <tbody>
          <tr>
            <td class="text-center">
              <h5><?= $rowV['titre'] ?></h5>
            </td>
          </tr>
          <tr>
            <td class="text-center"><?= $rowV['detail'] ?></td>
          </tr>
          <tr>
            <td class="text-center"><?= $rowV['prix'] ?>€</td>
          </tr>




        </tbody>
      </table>


    <?php
    }
    ?>
  </div>
</section>

<?php

$mysqli->close();
?>