<?php
// Connexion à la base de données
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Exercice', 'root', 'user');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$passwordHashed = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Requête préparé pour l'insertion d'un utilisateur
$query = $dbh->prepare('INSERT INTO Users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');
$query->execute([
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'password' => $passwordHashed
]);

// Redirection en PHP
header('location: /Tpblog/index.php');