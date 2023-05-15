<!DOCTYPE html>

<html>

<meta name="viewport" lang="fr-FR" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style_header.css">

<title>
	Accueil • FAMILINK
</title>

<body>
	<header>
		<?php
			include 'header.php'; // HEADER
		 ?>	 
	</header>
	<br>

	<div class="phrase">
		<form action="upload2.php" method="post" enctype="multipart/form-data">
			<input placeholder="Ecrire une phrase..." class="input-phrase" type="text" id="phrase" name="phrase"></input>
			<button class="button-phrase" type="submit" onclick="location.reload()";>Envoyer</button>
			
			<span STYLE="padding:0 0 0 10px;">			
			
			<label for="file">
			<img type="image" src="Image\download.svg" width=39px>
			<input type="file" class="input-file" id="file" name="file"></input>
			</label>
		</form>		
	</div>
</body>

<footer>
	<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFFFFF" fill-opacity="1" d="M0,160L120,170.7C240,181,480,203,720,202.7C960,203,1200,181,1320,170.7L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
	<?php
			include 'footer.php'; // FOOTER
	?>
</footer>
</html>