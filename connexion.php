<?php



try{
    $dbb = new PDO("musql:host=localhost;dbname=inscrit;","root","");
} catch(Exeption $e){
    die ( "une erreur a été trouvé :".$e->getMessage());
}




?>