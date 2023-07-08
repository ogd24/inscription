<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <?php
require_once "connext.php";



?>

</head>
<body>
  <div class="container">
    <h1>Connexion</h1>
    <form method="POST" action="log.php">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="mail" required>
      </div>
      <div class="form-group">
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" id="mot_de_passe" name="pass" required>
      </div>
      <button type="submit"  name= "validate"> Se connecter</button>
      
    </form>
    <div class="message">
      Si vous n'avez pas encore un compte, veuillez-vous <a href="inscrit.php" class="signup-link">inscrire ici</a>.
    </div>
  </div>
</body>
</html>
