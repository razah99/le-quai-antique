<?php

/*************************
 *  Page: inscription.php
 *  Page encodée en UTF-8
 **************************/

include 'header.php';
?>
<section class="justify-content-center m-5">
	<div class="inscriptionForm bg-warning-subtle rounded  w-50 mx-auto p-4">
		<h3 class="text-center mb-4">
			Inscription:
		</h3>
		<?php
		//si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
		if (isset($_POST['valider'])) {
			//vérifie si tous les champs sont bien  pris en compte:
			//on peut combiner isset() pour valider plusieurs champs à la fois
			if (!isset($_POST['nom'], $_POST['prenom'], $_POST['mdp'], $_POST['mail'], $_POST['alergies'])) {
				echo "Veuillez remplir tous les champs.";
			} else {
				//on vérifie le contenu de tous les champs, savoir si ils sont correctement remplis avec les types de valeurs qu'on souhaitent qu'ils aient
				if (empty($_POST['nom']) || empty($_POST['prenom'])) {
					//la preg_match définie: ^ et $ pour dire commence et termine par notre masque;
					//notre masque défini a-z pour toutes les lettres en minuscules et 0-9 pour tous les chiffres;
					//d'une longueur de 1 min et 15 max
					echo "Nom et/ou prenom manquant";
					//Il est préférable que le pseudo soit en lettres minuscules ceci afin d'être unique, par exemple si le choix peut être avec majuscule, deux membres pourrait avoir le même pseudo, par exemple Admin et admin et ce n'est pas ce que l'on veut.
				} else {
					//on vérifie le mot de passe:
					if (strlen($_POST['mdp']) < 5 or strlen($_POST['mdp']) > 15) {
						echo "Le mot de passe doit être d'une longueur minimum de 5 caractères et de 15 maximum.";
					} else {
						//on vérifie que l'adresse est correcte:
						if (!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i", $_POST['mail'])) {
							//cette preg_match est un petit peu complexe, je vous invite à regarder l'explication détaillée sur mon site c2script.com
							echo "L'adresse mail est incorrecte.";
							//normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
						} else {
							if (strlen($_POST['mail']) < 7 or strlen($_POST['mail']) > 50) {
								echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
							} else {
								$mysqli = mysqli_connect('localhost', 'root', '', 'le_quai_antique');
								//tout est précisés correctement, on inscrit le membre dans la base de données si le pseudo n'est pas déjà utilisé par un autre utilisateur
								//d'abord il faut créer une connexion à la base de données dans laquelle on souhaite l'insérer:
								//=mysqli_connect('localhost','root','root','le_quai_antique');//'serveur','nom d'utilisateur','pass','nom de la table'
								if (!$mysqli) {
									echo "Erreur connexion BDD";
									//Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
									//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
								} else {
									$Nom = htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8"); //htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
									$Prenom = htmlentities($_POST['prenom'], ENT_QUOTES, "UTF-8"); //htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
									$Mdp = md5($_POST['mdp']); // la fonction md5() convertie une chaine de caractères en chaine de 32 caractères d'après un algorithme PHP, cf doc
									$Mail = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");

									$Alergie = htmlentities($_POST['alergies'], ENT_QUOTES, "UTF-8");

									if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM membres WHERE mail='$Mail'")) != 0) { //si mysqli_num_rows retourne pas 0
										echo "Cet email est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
									} else {
										//insertion du membre dans la base de données:
										if (mysqli_query($mysqli, "INSERT INTO membres SET nom='$Nom', prenom='$Prenom', mdp='$Mdp', mail='$Mail', alergies='$Alergie', type='client'")) {
											header('refresh: 3, url=connexion.php');
											echo "Inscrit avec succès! Veuillez vous connecter maintenant";
											$LoggedIn = true; //pour cacher le formulaire
										} else {
											echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
											//echo "<br>Erreur retournée: ".mysqli_error($mysqli);
										}
									}
								}
							}
						}
					}
				}
			}
		}
		if (!isset($LoggedIn)) { //quand le membre sera inscrit, on définira cette variable afin de cacher le formulaire
		?>
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
					<input type="text" class="form-control" name="alergies" placeholder="Gluten">
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