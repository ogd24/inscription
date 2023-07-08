<?php
require "connext.php";

//validation du formulaire
if(isset($_POST)) {
    //verifier si tous les champs sont biens renseigner
    if(!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["date_de_naissance"])    AND !empty($_POST["sexe"])  AND !empty($_POST["email"])  AND !empty($_POST["pass"])) {
// Les données de l'utilisateur 
$user_nom = htmlspecialchars($_POST["nom"]);
$user_prenom = htmlspecialchars($_POST["prenom"]);
$user_date_de_naissance = htmlspecialchars($_POST["date_de_naissance"]);
$user_sexe = htmlspecialchars($_POST["sexe"]);
$user_email = htmlspecialchars($_POST["email"]);
$user_pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);


//Vérifier si l'utilisateurnest déja inscrit 
$checkIfUserAlreadyExists =$bdd->prepare("SELECT nom FROM user WHERE nom = ?");
$checkIfUserAlreadyExists ->execute(array($user_nom));
 if($checkIfUserAlreadyExists ->rowCount() ==0 ){

    //insérer l'utilisateur dans la base de donnée
    $insertUserOnWebsite = $bdd->prepare("INSERT INTO user(nom,prenom,date_de_naissance,sexe,email,pass) VALUES(?,?,?,?,?,?)");
     $insertUserOnWebsite ->execute(array($user_nom,$user_prenom, $user_date_de_naissance,$user_sexe,$user_email,$user_pass )); 
    $insertUserOnWebsite = $bdd->prepare("INSERT INTO user (nom, prenom, date_de_naissance, sexe, email, pass) VALUES (?, ?, ?, ?, ?, ?)");
$insertUserOnWebsite->execute(array($user_nom, $user_prenom, $user_date_de_naissance, $user_sexe, $user_email, $user_pass));


//recupération de l'utilisateur
$getInfosOffThisUserRep = $bdd->prepare  ("SELECT id,nom,prenom,date_de_naissance,sexe FROM user WHERE nom =? AND prenom =? AND date_de_naissance =?  AND sexe =?");
//$getInfosOffThisUserRep = $bdd->prepare  ( "SELECT id,nom,prenom,date_de_naissance,sexe FROM user WHERE nom =? AND prenom =? AND date_de_naissance =?  AND sexe =? ");

$getInfosOffThisUserRep-> execute(array($user_nom,$user_prenom, $user_date_de_naissance,$user_sexe )); 
$userInfos = $getInfosOffThisUserRep->fetch ();

 // Authentification de l'utilisateur
 $_SESSION["aut"]= true;
 $_SESSION["id"] = $userInfos["id"];
 $_SESSION["nom"] = $userInfos["nom"];
 $_SESSION["prenom"] = $userInfos["prenom"];
 $_SESSION["date_de_naissance"] = $userInfos["date_de_naissance"];
 $_SESSION["sexe"] = $userInfos["sexe"];
 $_SESSION["email"] = $userInfos["email"];

 //rédiriger l'utilisateur

 header("Location: home.php?nom=$nom&prenom=$prenom&dateNaissance=$dateNaissance&sexe=$sexe&email=$email&motDePasse=$motDePasse");

 exit;

} else{
    $errorMsg = "l'utilisateur existe déjà";
}

   }  else{
        $errorMsg = "Veuiillez compléter tous les champs";
    }
}

?> 