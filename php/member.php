<?php
session_start();

/*if (!isset($_SESSION['mail'])) {
	header("Refresh: 3; url=../php/connexion.php"); //redirection vers le formulaire de connexion
	echo "Vous devez vous connecter pour accéder à l'espace membre.<br><br><i>Redirection en cours, vers la page de connexion...</i>";
	exit(0); //on arrête l'éxécution du reste de la page avec exit, si le membre n'est pas connecté
}*/
$mail = $_SESSION['mail'];

include 'connect.php';

$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$mail'");
$info = mysqli_fetch_assoc($req);

include 'header.php';

?>


<h1 class="text-center p-5">Espace membre</h1>
<div class="p-3 bg-warning-subtle bg-opacity-10 border border-warning-subtle border-start-0 rounded-3 text-center">
	<h3 class="p-4">Vos informations:</h3>
	<?php if ($req) : ?>
		<p>Votre nom: <?= $info['nom']; ?></p>
		<p>Votre prénom: <?= $info['prenom']; ?></p>
		<p>Votre adresse email: <?= $info['mail']; ?></p>
		<p>Les alergies que vous avez signaler: <?= $info['alergies']; ?></p>
	<?php endif; ?>
</div>

<div class="d-flex justify-content-center p-4">
	<a class="p-2" href="member.php?modifier"><button type="button" class="btn btn-outline-dark">Modifier vos informations</button></a>
	<a class="p-2" href="deconnexion.php"><button type="button" class="btn btn btn-outline-dark">Déconnexion</button></a>
	<a class="p-2" href="member.php?supprimer"><button type="button" class="btn btn-outline-dark">Supprimer votre compte</button></a>
</div>

<?php
//si "?modifier" est dans l'URL:
if (isset($_GET['supprimer'])) {
	if ($_GET['supprimer'] != "ok") { ?>
		<div class="d-flex justify-content-center">
			<p class="m-2">Êtes-vous sûr de vouloir supprimer votre compte définitivement?</p>
			<br>
			<a href='member.php?supprimer=ok'><button type="button" class="btn btn-danger">OUI</button>
			</a> - <a href='member.php'> <button type="button" class="btn btn-success">NON</button>
			</a>
		</div>
	<?php
	} else {
		//on supprime le membre avec "DELETE"
		if (mysqli_query($mysqli, "DELETE FROM membres WHERE mail='$mail'")) {
			echo "Votre compte vient d'être supprimé définitivement.";
			unset($_SESSION['mail']); //on tue la session pseudo avec unset()
		} else {
			echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
			//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
		}
	}
}
//si "?modifier" est dans l'URL:
if (isset($_GET['modifier'])) {
	?>
	<div class="d-flex flex-column align-items-center">
		<h5>Que souhaitez vous modifier ?</h5>
		<p>Choisir une option:</p>
		<p> <a href="member.php?modifier=mail"><button type="button" class="btn btn-outline-dark">Adresse email</button></a>
			<a href="member.php?modifier=mdp"><button type="button" class="btn btn-outline-dark">Mot de passe</button></a>
		</p>
	</div>
	<hr />
	<?php
	if ($_GET['modifier'] == "mail") {
		echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
		if (isset($_POST['valider'])) {
			if (!isset($_POST['mail'])) {
				echo "Le champ mail n'est pas reconnu.";
			} else {
				if (!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i", $_POST['mail'])) {
					echo "L'adresse mail est incorrecte.";
				} else {
					if (mysqli_query($mysqli, "UPDATE membres SET mail='" . htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8") . "' WHERE mail='$mail'")) {
						echo "Adresse mail {$_POST['mail']} modifiée avec succès!";
						$TraitementFini = true; //pour cacher le formulaire
					} else {
						echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
						echo "<br>Erreur retournée: " . mysqli_error($mysqli);
					}
				}
			}
		}
		if (!isset($TraitementFini)) {
	?>
			<br>
			<form method="post" action="member.php?modifier=mail">
				<input type="email" name="mail" value="<?php echo $info['mail']; ?>" required>
				<input type="submit" name="valider" value="Valider la modification">
			</form>
		<?php
		}
	} elseif ($_GET['modifier'] == "mdp") {
		echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
		if (isset($_POST['valider'])) {
			//vérifie si tous les champs sont bien pris en compte:
			if (!isset($_POST['nouveau_mdp'], $_POST['confirmer_mdp'], $_POST['mdp'])) {
				echo "Un des champs n'est pas reconnu.";
			} else {
				if ($_POST['nouveau_mdp'] != $_POST['confirmer_mdp']) {
					echo "Les mots de passe ne correspondent pas.";
				} else {
					$Mdp = md5($_POST['mdp']);
					$NouveauMdp = md5($_POST['nouveau_mdp']);
					$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$mail' AND mdp='$Mdp'");
					//on regarde si le mot de passe correspond à son compte:
					if (mysqli_num_rows($req) != 1) {
						echo "Mot de passe actuel incorrect.";
					} else {
						//tout est OK, on met à jours son compte dans la base de données:
						if (mysqli_query($mysqli, "UPDATE membres SET mdp='$NouveauMdp' WHERE mail='$mail'")) {
							echo "Mot de passe modifié avec succès!";
							$LoggedIn = true; //pour cacher le formulaire
						} else {
							echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
							echo "<br>Erreur retournée: " . mysqli_error($mysqli);
						}
					}
				}
			}
		}
		if (!isset($LoggedIn)) {
		?>
			<br>
			<form method="post" action="member.php?modifier=mdp">
				<input type="password" name="nouveau_mdp" placeholder="Nouveau mot de passe..." required>
				<input type="password" name="confirmer_mdp" placeholder="Confirmer nouveau passe..." required>
				<input type="password" name="mdp" placeholder="Votre mot de passe actuel..." required>
				<input type="submit" name="valider" value="Valider la modification">
			</form>
<?php
		}
	}
}
?>

<?php
include '../php/footer.php';
?>