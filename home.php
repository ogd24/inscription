<?php
require "connext.php";

// Récupérer tous les utilisateurs
$getAllUsersQuery = $bdd->query("SELECT * FROM user");
$users = $getAllUsersQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Affichage des utilisateurs dans un tableau HTML -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
      <th>Sexe</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['prenom']; ?></td>
        <td><?php echo $user['date_de_naissance']; ?></td>
        <td><?php echo $user['sexe']; ?></td>
        <td><?php echo $user['email']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
