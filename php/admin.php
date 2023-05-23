<?php
include 'headerAdmin.php';
include 'connect.php';

if (!isset($_SESSION['mail'])) {
	header("Refresh: 3; url=connexion.php");
	echo "Vous devez vous connecter pour accéder à l'espace membre.<br><br><i>Redirection en cours, vers la page de connexion...</i>";

	exit(0);
}
$req = mysqli_query($mysqli, "SELECT * FROM membres");
$membre = mysqli_fetch_assoc($req);
if (mysqli_num_rows($req) == 1) {
	if (empty($membre['type']) and ($member['type'] !== 'client')) {
		header(('Location: admin.php'));
	} else {
		header('Location: member.php');
	}
}
$mail = $_SESSION['mail'];
//on récupère les infos du membre si on souhaite les afficher dans la page:
$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$mail'");
$info = mysqli_fetch_assoc($req);

?>

<div class="d-flex justify-content-center p-2">
	<a href="changeRmenu.php"><button type="button" class="btn btn-outline-dark m-2">MODIFIER LA CARTE</button>
	</a>
	<a href="changemenu.php"><button type="button" class="btn btn-outline-dark m-2">MODIFIER LE MENU</button>
	</a>
	<a href="changehourly.php"><button type="button" class="btn btn-outline-dark m-2">MODIFIER LES HORAIRES</button>
	</a>
</div>
<div class="d-flex justify-content-center mb-5">
	<a href="admin.php?modifier"><button type="button" class="btn btn-outline-dark m-2">MODIFIER VOS INFORMATIONS</button>
	</a>
	<a href="admin.php?supprimer"><button type="button" class="btn btn-outline-dark m-2">SUPPRIMER VOTRE COMPTE</button>
	</a>
	<a href="deconnexion.php"><button type="button" class="btn btn-outline-dark m-2">DÉCONNEXION</button>
	</a>
</div>
<hr />

<?php
// si? "supprimer" est dans l'url:
if (isset($_GET['supprimer'])) {
	if ($_GET['supprimer'] != "ok") { ?>
		<div class="d-flex justify-content-center">
			<p class="m-2">Êtes-vous sûr de vouloir supprimer votre compte définitivement?</p>
			<br>
			<a href='admin.php?supprimer=ok'><button type="button" class="btn btn-danger">OUI</button>
			</a> - <a href='admin.php'> <button type="button" class="btn btn-success">NON</button>
			</a>
		</div>
	<?php
	} else {
		if (mysqli_query($mysqli, "DELETE FROM membres WHERE mail='$mail'")) {
			echo "Votre compte vient d'être supprimé définitivement.";
		} else {
			echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
		}
	}
}
//si "?modifier" est dans l'URL:
if (isset($_GET['modifier'])) {
	?>
	<div class="d-flex flex-column align-items-center">
		<h5>Que souhaitez vous modifier ?</h5>
		<p>Choisir une option:</p>
		<p> <a href="admin.php?modifier=mail"><button type="button" class="btn btn-outline-dark">Adresse email</button></a>
			<a href="admin.php?modifier=mdp"><button type="button" class="btn btn-outline-dark">Mot de passe</button></a>
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
					//cette preg_match est un petit peu complexe, je vous invite à regarder l'explication détaillée sur mon site c2script.com
					echo "L'adresse mail est incorrecte.";
					//normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
				} else {
					//tout est OK, on met à jours son compte dans la base de données:
					if (mysqli_query($mysqli, "UPDATE membres SET mail='" . htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8") . "' WHERE mail='$mail'")) {
						echo "Adresse mail {$_POST['mail']} modifiée avec succès!";
						$TraitementFini = true; //pour cacher le formulaire
					} else {
						echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
						//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
					}
				}
			}
		}
		if (!isset($TraitementFini)) {
	?>
			<br>
			<form method="post" action="admin.php?modifier=mail">
				<input type="email" name="mail" value="<?php echo $info['mail']; ?>" required>
				<input type="submit" name="valider" value="Valider la modification">
			</form>
		<?php
		}
	} elseif ($_GET['modifier'] == "mdp") {
		echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
		//si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
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
							//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
						}
					}
				}
			}
		}
		if (!isset($LoggedIn)) {
		?>
			<br>
			<form method="post" action="admin.php?modifier=mdp">
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
</body>

</html>