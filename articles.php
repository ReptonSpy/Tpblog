<?php
$isInternPage = false;
$title = "comments";

// Connexion à MySQL
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Exercice', 'root', 'user');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$articles = $dbh->query('
SELECT articles.id, articles.title, articles.content, articles.published_at, articles.created_at
FROM articles');
?>

<table class="table table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Créé le</td>
        <td>Publié le </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles->fetchAll() as $article) : ?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['title'] ?></td>
            <td><?= $article['content'] ?></td>
            <td>
                <?php
                    $createdAt = new DateTime($article['created_at']);
                    echo $createdAt->format('d/m/Y H:i');
                    $publishedAt = new DateTime($article['published_at'])
                    echo $published->format('d/m/Y H:i')
                ?>
            </td>
            <td>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
