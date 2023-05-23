<?php
session_start();

include 'header.php';
include 'connect.php';


if (isset($_POST['1200']) || isset($_POST['1215']) || isset($_POST['1230']) || isset($_POST['1245']) || isset($_POST['1300'])) {

  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $phone = $_POST['phone'];
  $email = $_POST['mail'];
  $date = $_POST['date'];
  $couvert = $_POST['couvert'];
  $alergie = $_POST['alergie'];

  //$mysqli = mysqli_connect('localhost', 'root', '', 'le_quai_antique');
  /*if ($mysqli->connect_error) {
    die("La connexion a échoué : " . $mysqli->connect_error);
  }*/

  // Requête SQL pour insérer les données dans la table
  $sql1 = "INSERT INTO reservation (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '12:00')";

  $sql2 = "INSERT INTO reservation (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '12:30')";

  $sql3 = "INSERT INTO reservation (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '12:45')";

  $sql4 = "INSERT INTO reservation (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '13:00')";

  if (($mysqli->query($sql1)) || ($mysqli->query($sql2)) || ($mysqli->query($sql3)) || ($mysqli->query($sql4))) : ?>
    <div class="border rounded text-center text-white bg-success">
      <p class="mt-3">votre réservation a été enregistrer avec succes</p>
    </div>
  <?php else : ?>
    <div class="border rounded text-center text-danger">
      <p>Une erreur s'est produite, veuillez essayer plus tard</p>
    </div>
<?php endif;
}



//soir
if ((isset($_POST['1900'])) || (isset($_POST['1915'])) || (isset($_POST['1930'])) || (isset($_POST['1945'])) || (isset($_POST['2000'])) || (isset($_POST['2015'])) || (isset($_POST['2030'])) || (isset($_POST['2045'])) || (isset($_POST['2100']))) {

  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $phone = $_POST['phone'];
  $email = $_POST['mail'];
  $date = $_POST['date'];
  $couvert = $_POST['couvert'];
  $alergie = $_POST['alergie'];

  // Requête SQL pour insérer les données dans la table
  $sql5 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '19:00')";

  $sql6 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '19:15')";

  $sql7 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '19:30')";

   $sql8 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '19:45')";

$sql9 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '20:00')";

$sql10 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '20:15')";

$sql11 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '20:30')";

$sql12 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '20:45')";

$sql13 = "INSERT INTO reservation2 (nom, prenom, tel, mail, date, couvert, alergie, heure) VALUES ('$nom', '$prenom', '$phone', '$email', '$date', '$couvert', '$alergie', '21:00')";

  if (($mysqli->query($sql5)) || ($mysqli->query($sql6)) || ($mysqli->query($sql7)) || ($mysqli->query($sql8)) || ($mysqli->query($sql9)) || ($mysqli->query($sql10)) || ($mysqli->query($sql11)) || ($mysqli->query($sql12)) || ($mysqli->query($sql13))) : ?>
    <div class="border rounded text-center text-white bg-success">
      <p class="mt-3">votre réservation a été enregistrer avec succes</p>
    </div>
  <?php else : ?>
    <div class="border rounded text-center text-danger">
      <p>Une erreur s'est produite, veuillez essayer plus tard</p>
    </div>
  <?php endif;

}
?>


<h5 class="text-center p-4">RÉSEVER UNE TABLE</h5>
<section class="d-flex mx-auto w-50">
  <form action="" method="post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Votre nom:</label>
      <input type="text" class="form-control" name="nom" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Prénom:</label>
      <input type="text" class="form-control" name="prenom" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Téléphone:</label>
      <input type="tel" class="form-control" name="phone" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email:</label>
      <input type="email" class="form-control" name="mail" aria-describedby="emailHelp">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Date:</span>
      <input type="date" name="date" class="form-control">
    </div>
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Nombre de couverts</label>
      <select class="form-select" name="couvert">
        <option selected>Choose...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Allergies à signaler:</label>
      <input type="text" class="form-control" name="alergie" aria-describedby="emailHelp">
    </div>
    <h5>MIDI</h5>
    <div class="midi">
      <button type="submit" class="btn btn-outline-warning" name="1200">12:00</button>
      <button type="submit" class="btn btn-outline-warning" name="1215">12:15</button>
      <button type="submit" class="btn btn-outline-warning" name="1230">12:30</button>
      <button type="submit" class="btn btn-outline-warning" name="1245">12:45</button>
      <button type="submit" class="btn btn-outline-warning" name="1300">13:00</button>
    </div><br>
    <h5>SOIR</h5>
    <div class="soir">
      <button type="submit" class="btn btn-outline-warning" name="1900">19:00</button>
      <button type="submit" class="btn btn-outline-warning" name="1915">19:15</button>
      <button type="submit" class="btn btn-outline-warning" name="1930">19:30</button>
      <button type="submit" class="btn btn-outline-warning" name="1945">19:45</button>
      <button type="submit" class="btn btn-outline-warning" name="2000">20:00</button>
      <button type="submit" class="btn btn-outline-warning" name="2015">20:15</button>
      <button type="submit" class="btn btn-outline-warning" name="2030">20:30</button>
      <button type="submit" class="btn btn-outline-warning" name="2045">20:45</button>
      <button type="submit" class="btn btn-outline-warning" name="2100">21:00</button>
    </div>
  </form>
</section>

<section class="w-75 mx-auto mt-5">
<?php
$maxCouvert = 30;
// Requête SQL pour récupérer les dates et effectuer la somme des couverts
$sql1 = "SELECT date, SUM(couvert) AS total_couvert FROM reservation GROUP BY date";
$sql2 = "SELECT date, SUM(couvert) AS total_couvert FROM reservation2 GROUP BY date";
$result1 = $mysqli->query($sql1);
$result2 = $mysqli->query($sql2);

if (($result1->num_rows > 0) && ($result2->num_rows > 0)) {
  // Parcourir les résultats
  while ($row = $result1->fetch_assoc()) {
    $date = $row["date"];
    $totalCouvert = $row["total_couvert"];
    $placeDispo = $maxCouvert - $totalCouvert;
    if ($placeDispo <= 0): ?> 
    <div class="dateDispo border rounded bg-danger text-center m-2 align-items-center">
      <p class="mt-3">Date:  <?= $date ?>, nous sommes malheuresement complet à cette date.</p>
    </div><br>
   <?php else: ?>
    <div class="placeDispoMidi border rounded bg-warning-subtle text-center m-2 align-items-center">
      <p class="mt-3">Date:  <?= $date ?>, place disponible (midi): <?= $placeDispo ?></p>
    </div>
    <?php endif; ?>
    <?php 
  }
}
?>
</section>

<!-- date pour le soir -->
<section class="w-75 mx-auto mt-5">
<?php
// Requête SQL pour récupérer les dates et effectuer la somme des couverts

if ($result2->num_rows > 0) {
  // Parcourir les résultats
  while ($row = $result2->fetch_assoc()) {
    $date = $row["date"];
    $totalCouvert = $row["total_couvert"];
    $placeDispo = $maxCouvert - $totalCouvert;
    if ($placeDispo <= 0): ?> 
    <div class="dateDispo border rounded bg-danger text-center m-2 align-items-center">
      <p class="mt-3">Date:  <?= $date ?>, nous sommes malheuresement complet à cette date.</p>
    </div><br>
   <?php else: ?>
    <div class="placeDispoMidi border rounded bg-warning-subtle text-center m-2 align-items-center">
      <p class="mt-3">Date:  <?= $date ?>, place disponible (soir): <?= $placeDispo ?></p>
    </div>
    <?php endif; ?>
    <?php 
  }
}
?>

</section>

<?php
// Fermeture de la connexion à la base de données
$mysqli->close();
include 'footer.php';
?>