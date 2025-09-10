<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8', 'root', 'usbw');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $message));
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie</title>
</head>
<body>
    <form method="post" action="">
        <h3><u>Pseudo</u></h3>
        <input type="text" name="pseudo"><br><br>
        <h3><u>Message</u></h3>
        <textarea name="message"></textarea><br>
        <input type="submit" name="valider">
    </form>

    <section id="message"></section>
</body>
</html>
