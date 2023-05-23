<?php

session_start();
include 'header.php';
?>
<section class="logSign d-flex flex-row flex-wrap justify-content-center ">
	<div class="loginForm d-flex flex-column m-4 bg-warning-subtle p-4 rounded">
		<h3 class="text-center mb-4">
			Connexion:
		</h3>
		<?php
		if (isset($_SESSION['mail'])) {
			header('Location: member.php');
		} else {
			if (isset($_POST['valider'])) {
				if (!isset($_POST['mail'], $_POST['mdp'])) {
					echo "Un des champs n'est pas reconnu.";
				} else {
					include 'connect.php';
					$mail = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");
					$Mdp = md5($_POST['mdp']);
					$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$mail' AND mdp='$Mdp'");
					$membre = mysqli_fetch_assoc($req);
					$_SESSION['mail'] = $mail;
					if (mysqli_num_rows($req) == 1) {
						if (empty($membre['type']) AND ($member['type'] !== 'client')) {
								header(('Location: admin.php'));
							} else {
								header('Location: member.php');
							}
					}
					//on regarde si le membre est inscrit dans la bdd:
					if (mysqli_num_rows($req) != 1) {
						echo "mail ou mot de passe incorrect.";
						$LoggedIn = true;
					}
				}
			}
		}
		if (!isset($LoggedIn)) {
		?>
			<form class="m-2" method="post" action="">
				<div class="mb-3">
					<label for="text" class="form-label">Votre mail</label>
					<input type="text" class="form-control" name="mail">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Mot de passe</label>
					<input type="password" class="form-control" name="mdp">
				</div>
				<button type="submit" name="valider" class="btn bg-warning m-4">Connexion</button>
			</form>
	</div>
</section>
<?php
		}

		include 'footer.php';
?>