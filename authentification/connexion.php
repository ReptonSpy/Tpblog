<?php
// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Exercice', 'root', 'user');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Démarre la session
session_start();
// préparation de la requête, selection de l'email et du mot de passe avec une condition où l'email = ?
$query = $dbh->prepare('SELECT email, password FROM users WHERE email = ?');
//exécution de la requête, on lit ce qui a été entré dans le formulaire
$query->execute([$_POST['email']]);
//création d'un fetch
$user = $query->fetch();
// si l'email entré n'est pas dans la bdd, on retourne un message d'erreur et on rafraichi la page
if (!$user) {
    $_SESSION['connection_error_email'] = "L'email est incorrect !";

    header('location: /index.php');
} else {
    unset($_SESSION['connection_error_email']);

    if (password_verify($_POST['password'], $user['password'])) {
        unset($_SESSION['connection_error_password']);
        $_SESSION['is_connected'] = true;

        header('location: /articles.php');
    } else {
        $_SESSION['connection_error_password'] = "Le mot de passe est incorrect !";

        header('location: /connexion.php');
    }
}