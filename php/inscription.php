<?php
session_start();

if (isset($_POST['valider'])) {
	if (!isset($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail'])) {
		echo "Veuillez remplir tous les champs.";
	} else {
		//on vérifie le contenu de tous les champs, savoir si ils sont correctement remplis avec les types de valeurs qu'on souhaitent qu'ils aient
		if (empty($_POST['nom']) || empty($_POST['prenom'])) {
			echo "Nom et/ou prenom manquant";
		} else {
			//on vérifie le mot de passe:
			if (strlen($_POST['mdp']) < 5 or strlen($_POST['mdp']) > 15) {
				echo "Le mot de passe doit être d'une longueur minimum de 5 caractères et de 15 maximum.";
			} else {
				//on vérifie que l'adresse est correcte:
				if (!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i", $_POST['mail'])) {
					echo "L'adresse mail est incorrecte.";
				} else {
					if (strlen($_POST['mail']) < 7 or strlen($_POST['mail']) > 50) {
						echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
					} else {
						include 'connect.php';
						if (!$mysqli) {
							echo "Erreur connexion BDD";
						} else {
							$Nom = htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8");
							$Prenom = htmlentities($_POST['prenom'], ENT_QUOTES, "UTF-8");
							$Mdp = md5($_POST['mdp']);
							$Mail = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");
							$Allergie = htmlentities($_POST['allergies'], ENT_QUOTES, "UTF-8");
							if($Allergie == '') {
								
							}

							if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$Mail'")) != 0) {
								echo "Cet email est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
							} else {
								//insertion du membre dans la base de données:
								if (mysqli_query($mysqli, "INSERT INTO membres SET nom='$Nom', prenom='$Prenom', mdp='$Mdp', mail='$Mail', allergies='$Allergie', type='client'")) {
									header('refresh: 3, url=connexion.php');
									echo "Inscrit avec succès! Veuillez vous connecter maintenant";
									$LoggedIn = true; //pour cacher le formulaire
								} else {
									echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
									//echo "<br>Erreur retournée: " . mysqli_error($mysqli);
								}
							}
						}
					}
				}
			}
		}
	}
}

include 'header.php';
if (!isset($LoggedIn)) {
?>
<section class="inscriptionForm d-flex justify-content-center mx-auto m-2" style="max-width: 992px;">
		<div class="bg-warning-subtle rounded mx-auto p-4">
			<h3 class="text-center mb-4">
				Inscription:
			</h3>
			<form id="inscription" class="row g-3 m-2 text-start" method="post" action="inscription.php">
				<div class="col-12">
					<label for="nom" class="form-label">Nom</label>
					<input type="text" class="form-control" name="nom" placeholder="">
				</div>
				<div class="col-12">
					<label for="prenom" class="form-label">Prénom</label>
					<input type="text" class="form-control" name="prenom" placeholder="">
				</div>
				<div class="col-md-12">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" name="mail">
				</div>
				<div class="col-md-12">
					<label for="mot_de_passe" class="form-label">Mot de passe</label>
					<input type="password" class="form-control" name="mdp">
				</div>
				<div class="col-12">
					<label for="inputAlergie" class="form-label">Alergie à signaler</label>
					<input type="text" class="form-control" name="allergies" placeholder="Gluten">
				</div>
				<div class="col-12 text-end p-2">
					<button type="submit" name="valider" class="btn bg-warning ">S'inscrire</button>
				</div>
			</form>
		</div>
	</section>
<?php
}
include 'footer.php';
?>