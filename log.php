<?php
require "connext.php";

//validation du formulaire
if(isset($_POST["validate"])) {
    //verifier si tous les champs sont biens renseigner
    if(!empty($_POST["email"])  AND !empty($_POST["pass"])) {


// Les données de l'utilisateur 

$user_email = htmlspecialchars($_POST["email"]);
$user_pass = htmlspecialchars($_POST["pass"], PASSWORD_DEFAULT);




//recupération de l'utilisateur
$getInfosOffThisUserRep = $bdd->prepare  ( "SELECT id,nom,prenom,date_de_naissance,sexe FROM user WHERE nom =? AND prenom =? AND date_de_naissance =?  AND sexe =? ");
 $getInfosOffThisUserRep-> execute(array($user_nom,$user_prenom, $user_date_de_naissance,$user_sexe )); 
 $userInfos = $getInfosOffThisUserRep->fetch ();

 // vérifier si l'utilisateur exist (l'eamil exiiste)
 $checkIfUserExists = $bdd->prepare("SELECT * FROM user WHERE email= ?");
 $checkIfUserExists = $bdd->execute(array(user_email));
 if($checkIfUserExists->rowCount() >0){
    //vérification du mot de pass

    if(password_verify($user_pass, $userInfos["pass"])){
    
        // Authentification de l'utilisateur
 $_SESSION["aut"]= true;
 $_SESSION["id"] = $userInfos["id"];
 $_SESSION["nom"] = $userInfos["nom"];
 $_SESSION["prenom"] = $userInfos["prenom"];
 $_SESSION["date_de_naissance"] = $userInfos["date_de_naissance"];
 $_SESSION["sexe"] = $userInfos["sexe"];
 $_SESSION["email"] = $userInfos["email"];


 
    } else{
        $errorMsg = "votre mot de passe est incorrect"; 
    }
 }else{
    $errorMsg = "votre email est incorrect";
 }

 

} else{
    $errorMsg = "l'utilisateur existe déjà";

}


   }  else{
        $errorMsg = "Veuiillez compléter tous les champs";
    }
   
//rédiriger l'utilisateur

// header("location:index.php");
header("Location: home.php");
    exit;






?> 