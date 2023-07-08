






<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
  <div class="container">
    <h1>Inscription</h1>
    <form method="POST" action="inscription.php">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
      <div class="form-group">
        <label for="date_naissance">Date de naissance</label>
        <input type="date" id="date_naissance" name="date_de_naissance" required>
      </div>
      <div class="form-group">
        <label for="sexe">Sexe</label>
        <select id="sexe" name="sexe" required>
          <option disabled selected>Sélectionnez votre sexe</option>
          <option value="masculin">Masculin</option>
          <option value="feminin">Féminin</option>
          
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" id="mot_de_passe" name="pass" required>
      </div>
      <button type="submit">S'inscrire</button>
      
    </form>
  </div>
</body>
</html>
