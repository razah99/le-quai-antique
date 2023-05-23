<?php
include 'connect.php';

$recupH = mysqli_query($mysqli, "SELECT lundi_midi, lundi_soir, mardi_midi, mardi_soir, mercredi_midi, mercredi_soir, jeudi_midi, jeudi_soir, vendredi_midi, vendredi_soir, samedi_midi, samedi_soir, dimanche_midi, dimanche_soir FROM horaires WHERE horaire_id = 1");

$horaire = mysqli_fetch_assoc($recupH);

$mysqli->close();
?>

<footer id="hourly" class="footer mx-auto">
    <hr class="border border-dark border-2 opacity-50 w-75 mx-auto mt-5">

    <div class="d-flex flex-wrap justify-content-around align-items-center">
    <div class="address d-flex flex-column mt-4">
        <h3 class="text-center">Nous contacter</h3><br>
        <h5 class="text-center">Par Téléphone:</h5>
        <p class="text-center">06 06 00 00 00</p><br>
        <h5 class="text-center">Par email:</h5>
        <p class="text-center">contact@le-quai-antique.test</p><br>
        <h5 class="text-center">Adresse:</h5>
        <p class="text-center">Rue de la pommeraie<br>73000 Chambery</p>
    </div>

    <table class="table m-5">
        <thead>
            <tr>
                <th scope="col" colspan="2" class="text-center p-5"><h3>Nos horaires d'ouverture:</h3></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lundi</td>
                <td class="text-end"><?= $horaire['lundi_midi'] ?><br><?= $horaire['lundi_soir'] ?></td>
            </tr>
            <tr>
                <td>Mardi</td>
                <td class="text-end"><?= $horaire['mardi_midi'] ?><br><?= $horaire['mardi_soir'] ?></td>
            </tr>
            <tr>
                <td>Mercredi</td>
                <td class="text-end"><?= $horaire['mercredi_midi'] ?><br><?= $horaire['mercredi_soir'] ?></td>
            </tr>
            <tr>
                <td>Jeudi</td>
                <td class="text-end"><?= $horaire['jeudi_midi'] ?><br><?= $horaire['jeudi_soir'] ?></td>
            </tr>
            <tr>
                <td>Vendredi</td>
                <td class="text-end"><?= $horaire['vendredi_midi'] ?><br><?= $horaire['vendredi_soir'] ?></td>
            </tr>
            <tr>
                <td>Samedi</td>
                <td class="text-end"><?= $horaire['samedi_midi'] ?><br><?= $horaire['samedi_soir'] ?></td>
            </tr>
            <tr>
                <td>Dimanche</td>
                <td class="text-end"><?= $horaire['dimanche_midi'] ?><br><?= $horaire['dimanche_soir'] ?></td>
            </tr>
        </tbody>
    </table>
    </div>

    <ul class="feet nav justify-content-center p-3" style="font-weight: bold;">
        <li class="nav-item">
            <a class="nav-link link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="#">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="php/menu.php">Voir la carte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="php/reservation.php">Réserver une table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="#">C.G.V.</a>
        </li>
    </ul>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>