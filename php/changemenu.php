<?php 
include 'headerAdmin.php';
include 'connect.php';

$recup1 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 1");
$recup2 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 2");
$recup3 = mysqli_query($mysqli, "SELECT titre, prix, `desc` FROM menus WHERE menu_id = 3");

$Menu1 = mysqli_fetch_assoc($recup1);
$Menu2 = mysqli_fetch_assoc($recup2);
$Menu3 = mysqli_fetch_assoc($recup3);


if (isset($_POST['modifier1'])) {
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $description = $_POST['desc'];
    $e1 = mysqli_query($mysqli, "UPDATE menus SET titre='$titre', prix='$prix', `desc`='$description' WHERE menu_id = 1");
    if ($e1 === true) {
        echo "bravo";
    } else {
        echo "une erreur s'est produite.";
    }
}



if (isset($_POST['modifier2'])) {
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $description = $_POST['desc'];
    $e2 = mysqli_query($mysqli, "UPDATE menus SET titre='$titre', prix='$prix', `desc`='$description' WHERE menu_id = 2");
    if ($e2 === true) {
        echo "bravo";
    } else {
        echo "une erreur s'est produite.";
    }
}

if (isset($_POST['modifier3'])) {
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $description = $_POST['desc'];
    $e3 = mysqli_query($mysqli, "UPDATE menus SET titre='$titre', prix='$prix', `desc`='$description' WHERE menu_id = 3");
    if ($e3 === true) {
        echo "bravo";
    } else {
        echo "une erreur s'est produite.";
    }
}

$mysqli->close();
?>
<div class="d-flex justify-content-center mx-auto p-5">
<a href="admin.php"><button type="button" class="btn btn-outline-danger text-center">Retourner à votre espace</button>
</a>
</div>
<h3 class=" p-3 text-center">Modifier le menu:</h3>
    <section class="d-flex justify-content-center">
        
        <div class="d-flex flex-column p-3">
            <h3>Emplacement 1:</h3>
            <form class="row g-3 needs-validation" method="post" action="changemenu.php">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="validationCustom01" name="titre">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Description</label>
                    <input type="text" class="form-control" id="validationCustom02" name="desc">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="validationCustom02" name="prix">
                </div>
                <div class="col-12">
                    <button class="btn btn-warning" type="submit" name="modifier1">Modifier</button>
                </div>
            </form>
        </div>

        <div class="d-flex flex-column p-3">
            <h3>Emplacement 2:</h3>
            <form class="row g-3 needs-validation" method="post" action="changemenu.php">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="validationCustom01" name="titre">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Description</label>
                    <input type="text" class="form-control" id="validationCustom02" name="desc">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="validationCustom02" name="prix">
                </div>
                <div class="col-12">
                    <button class="btn btn-warning" type="submit" name="modifier2">Modifier</button>
                </div>
            </form>
        </div>

        <div class="d-flex flex-column p-3">
            <h3>Emplacement 3:</h3>
            <form class="row g-3 needs-validation" method="post" action="changemenu.php">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="validationCustom01" name="titre">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Description</label>
                    <input type="text" class="form-control" id="validationCustom02" name="desc">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="validationCustom02" name="prix">
                </div>
                <div class="col-12">
                    <button class="btn btn-warning" type="submit" name="modifier3">Modifier</button>
                </div>
            </form>
        </div>
    </section>
    <hr>
    <main>
    <h3 class="text-center m-5">VOIR LES MENUS</h3>
        <div class="d-flex flex-row flex-wrap">
            <div class="col-sm-4 mb-3 mb-sm-0 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu1["titre"] ?><br><?= $Menu1["prix"] ?> €</h5>
                        <p class="card-text"><?= $Menu1["desc"] ?></p>
                        <a href="php/reservation.php" class="btn btn-success shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu2["titre"] ?><br><?= $Menu2["prix"] ?></h5>
                        <p class="card-text"><?= $Menu2["desc"] ?></p><br>
                        <a href="php/reservation.php" class="btn btn-success shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $Menu3["titre"] ?><br><?= $Menu3["prix"] ?></h5>
                        <p class="card-text"><?= $Menu3["desc"] ?></p><br>
                        <a href="php/reservation.php" class="btn btn-success shadow">RÉSERVER</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>