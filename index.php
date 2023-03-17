<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$title = "Connexion";


?>
<!-- connexion/authentification sur le site -->
<div class="main">
    <div class="connexion">
        <h1 class="text-center"><?= $title ?></h1>
        <form action="index.php" method="post">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email">
            <label class="form-label mt-3" for="password">Mot de passe</label>
            <input class="form-control" id="password" type="password" name="password">
            <button class="btn btn-primary mt-3 w-100" type="submit">Se connecter</button>
        </form>
        <!--redirection vers la page d'inscription si l'utilisateur n'a pas de compte -->
        <p>Si vous n'avez pas de compte et souhaitez vous inscrire <a href="inscription.php"> cliquez-ici. </a> </p>
        


        <!-- Gestion des erreurs -->
        <?php if (isset($_SESSION['connection_error_email'])): ?>
            <p><?= $_SESSION['connection_error_email'] ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['connection_error_password'])): ?>
            <p><?= $_SESSION['connection_error_password'] ?></p>
        
        <?php endif; ?>

    </div>
</div>
<?php
// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Exercice', 'root', 'user');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$articles = $dbh->query('
SELECT products.id, products.name, products.description, products.price, products.created_at, product_categories.label 
FROM articles 
    JOIN product_categories 
        ON products.category_id = product_categories.id');
?>

<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Description</td>
        <td>Prix</td>
        <td>Catégorie</td>
        <td>Créé le</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products->fetchAll() as $product) : ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?> €</td>
            <td><?= $product['label'] ?></td>
            <td>
                <?php
                    $createdAt = new DateTime($product['created_at']);
                    echo $createdAt->format('d/m/Y H:i');
                ?>
            </td>
            <td>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

?>
</body>
</html>
