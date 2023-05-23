<?php
session_start();

include 'header.php';
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
include 'footer.php';
?>