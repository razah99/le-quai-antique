<?php
include 'headerAdmin.php';
include 'connect.php';

if (isset($_POST['modifier'])) {
  $luAm = $_POST['lundi_midi'];
  $luPm = $_POST['lundi_soir'];
  $maAm = $_POST['mardi_midi'];
  $maPm = $_POST['mardi_soir'];
  $meAm = $_POST['mercredi_midi'];
  $mePm = $_POST['mercredi_soir'];
  $jeAm = $_POST['jeudi_midi'];
  $jePm = $_POST['jeudi_soir'];
  $veAm = $_POST['vendredi_midi'];
  $vePm = $_POST['vendredi_soir'];
  $saAm = $_POST['samedi_midi'];
  $saPm = $_POST['samedi_soir'];
  $diAm = $_POST['dimanche_midi'];
  $diPm = $_POST['dimanche_soir'];

  $update = mysqli_query($mysqli, "UPDATE horaires SET 
    lundi_midi = '$luAm', 
    lundi_soir = '$luPm', 
    mardi_midi = '$maAm', 
    mardi_soir = '$maPm', 
    mercredi_midi = '$meAm', 
    mercredi_soir = '$mePm', 
    jeudi_midi = '$jeAm', 
    jeudi_soir = '$jePm', 
    vendredi_midi = '$veAm', 
    vendredi_soir = '$vePm', 
    samedi_midi = '$saAm', 
    samedi_soir = '$saPm', 
    dimanche_midi = '$diAm', 
    dimanche_soir = '$diPm' WHERE 1");

  if ($update == true) : ?>
    <div class="d-flex justify-content-center mx-auto p-2"><button type="button" class="btn btn-success">La modification a été efffectué avec succès.</button></div>
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

<section class="d-flex justify-content-center">
  <form action="" method="post">
    <div class="input-group">
      <span class="input-group-text">Lundi</span>
      <input type="text" name="lundi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="lundi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">Mardi</span>
      <input type="text" name="mardi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="mardi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">mercredi</span>
      <input type="text" name="mercredi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="mercredi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">Jeudi</span>
      <input type="text" name="jeudi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="jeudi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">Vendredi</span>
      <input type="text" name="vendredi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="vendredi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">Samedi</span>
      <input type="text" name="samedi_midi" class="form-control" placeholder="Midi">
      <input type="text" name="samedi_soir" class="form-control" placeholder="Soir">
    </div>
    <div class="input-group">
      <span class="input-group-text">Dimanche</span>
      <input type="text" name="dimanche_midi" class="form-control" placeholder="Midi">
      <input type="text" name="dimanche_soir" class="form-control" placeholder="Soir">
    </div>
    <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
  </form>
</section>