<?php
// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', 'usbw');

// Récupérer les messages (du plus récent au plus ancien)
$recupMessages = $bdd->prepare('SELECT * FROM messages ORDER BY id DESC');
$recupMessages->execute();

while ($message = $recupMessages->fetch()) {
    ?>
    <div class="message">
        <h4><?= htmlspecialchars($message['pseudo']); ?></h4>
        <p><?= nl2br(htmlspecialchars($message['message'])); ?></p>
    </div>
    <?php
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Messages</title>
    </head>
    <body></body>
    <style>
        body{
            background-color:black;
            color:white;
        }
    </style>
</html>