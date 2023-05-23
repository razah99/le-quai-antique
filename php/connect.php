<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'le_quai_antique');
if ($mysqli->connect_error) {
  die("La connexion a échoué : " . $mysqli->connect_error);
}

?>