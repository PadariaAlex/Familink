<!DOCTYPE html>
<html>
<head>
    <title>Compte - FAMILINK</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_compte.css">
    <link rel="stylesheet" href="style_header.css">
</head>
<body>
    <header>
		<?php
			include 'header.php'; // HEADER
		 ?>	
    </header>
    <main>
        <section class="profil">
            <div class="container2">
                <h2 class="ProCol">Profil</h2>
                <img class="photo-profil" src="Image/Alex.png"/>
                <div class="infos">
                    <p><strong>Nom :</strong> Garnier</p>
                    <p><strong>Prénom :</strong> Michel</p>
                    <p><strong>Email :</strong> michel.garnier@gmail.com</p>
                    <a href="#">Modifier le mot de passe</a>
                </div>
            </div>
        </section>
		<div class="separator"></div>
        <section class="patient">
            <div class="container2">
                <h2 class="ProCol">Patient</h2>
                <img class="photo-patient" src="Image/Pierrr.png"/>
                <div class="infos">
                    <p><strong>Nom :</strong> Martin</p>
                    <p><strong>Prénom :</strong> Lucie</p>
                    <p><strong>Age :</strong> 84 ans</p>
                    <p><strong>EHPAD :</strong> Résidence de la Plaine</p>
                    <p><strong>Depuis :</strong> 2 ans</p>
                    <p><strong>Maladies :</strong> Alzheimer, Parkinson</p>
                </div>
            </div>
        </section>
			<div class="logout">
			  <a id="deconnexion" href="#" class="btn-logout">Se déconnecter</a>
			</div>

			<div class="popup" id="popup">
			  <div class="popup-content">
				<p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
				<div class="popup-buttons">
				  <form method="POST">
				    <button id="oui" name="valider" value="valider" class="btn-yes">Oui</button>
				    <button id="non" name="annuler" value="annuler" class="btn-no">Non</button>
				  </form>
				</div>
			  </div>
			</div>
		
		<script>
			const popup = document.querySelector('#popup');
			const popupContent = document.querySelector('#popup-content');
			const deconnexionButton = document.querySelector('#deconnexion');
			const ouiButton = document.querySelector('#oui');
			const nonButton = document.querySelector('#non');

			deconnexionButton.addEventListener('click', () => {
				popup.style.display = 'flex';
			});

			nonButton.addEventListener('click', () => {
				popup.style.display = 'none';
			});

			ouiButton.addEventListener('click', () => {
				popup.style.display = 'none';
				exit;
			});
		</script>
		<?php
			if(isset($_POST['valider']))
			{ 
				session_destroy();
				header('Location: index.php');
			}
		?>
    </main>
</body>
<footer>
	<?php
			include 'footer.php'; // FOOTER
	?>
</footer>
</html>




<!--

MODIFIER CSS HEADER ET COMPTE (problème Nav ul)

ajouter popup si message bien envoyé


si bouton envoyé appuyé et pas connecté, alors popup "pouvez pas" + annuler envoi

créer une page accueil et une page envoie.php séparé ???



-->