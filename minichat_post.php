<?php
// Connexion à la base de données

$pseudo = $_POST['pseudo'];
$msg = $_POST['msg'];
    
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); /*Precise en detail les erreurs*/



// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, msg, date) VALUES(:pseudo, :msg, NOW())');
/* $req = $bdd->prepare('DELETE INTO minichat WHERE msg');*/
$req->execute(array(
   'pseudo'=>  $pseudo,
   'msg'  => $msg

));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>