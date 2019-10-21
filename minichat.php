<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Minichat</title>
</head>

<body>

<!--Formulaire-->
<fieldset>
    <legend>Minichat</legend>
    <form class="minichat" action="minichat_post.php" method="post">
        <p>
            <label for="pseudo">Pseudo * : <input type="text" name="pseudo" placeholder="Pseudo"></label>
            
        </p>

        <p>
            <label for="message">Message * : <input type="text" name="message" placeholder="Message"></label>
           
        </p>

        <input type="submit" value="envoyer"/>
        <input type="submit" value="supprimer" name="bouton">
</fieldset>
<!--Formulaire-->

   

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); /*Precise en detail les erreurs*/
    /*Permet de ce connecter a MySQL*/
    $reponse = $bdd->query('SELECT * FROM minichat');/*Selectionne tout la table de notre base de données */


    while ($donnees = $reponse->fetch()) /*affiche tout les elements selectionner */ {
        echo '<p>' . $donnees['date'] . " ". ':' . " ". $donnees['pseudo'] . '<br>'  . $donnees['msg'] . '</p>';
    }
    echo 'MiniTchat';
                    
    echo date(" Y"); /*affiche les 4 chiffre de l'année*/ /*Mettre un y en minuscule pour afficher juste les deux dernier chiffre de l'année*/

    if (isset($_GET["bouton"])) {
        $bdd -> exec('DELETE FROM minichat');
        echo "<br> Votre message a été supprimer";
    }
    ?>

</body>

</html>