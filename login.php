<!DOCTYPE html>
<html>
  <head>
    <title>Page de connexion</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style_header.css">
    
    <?php
		include 'header.php'; // HEADER
	 ?>	 
    
  </head>
  <body>
    <form action="register.php" method="POST">
      <h1>Connexion</h1>
      <input type="text" name="user" placeholder="Nom d'utilisateur">
      <input type="password" name="Password" placeholder="Mot de passe">
      <input type="submit" value="Se connecter">
	  
		<?php if (isset($message)) { ?>
			<p class="back">coucou<?php echo $message; ?></p>
		<?php } ?>
	
    </form>
  </body>
  <br>
	
<footer>
	<?php
		include 'footer.php'; // FOOTER
	?>
</footer>
</html>
