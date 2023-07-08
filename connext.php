<?php



try{
    session_start();
    $bdd= new PDO("mysql:host=localhost;dbname=inscrit;","root","");
} catch(Exeption $e){
    die ( "une erreur a été trouvé :".$e->getMessage());
}




?>