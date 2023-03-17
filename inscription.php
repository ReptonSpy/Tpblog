<?php
$title = "Inscription";
?>
<!--Inscription de l'utilisateur -->
<body class="bg-light h-100">
<div class="w-50 h-100 d-flex justify-content-center align-items-center m-auto">
    <div class="w-100 bg-white p-5 rounded">
        <h1 class="text-center"><?= $title ?></h1>
        <form action="authentification/inscription.php" method="post">
            <label class="form-label" for="firstname">Prénom</label>
            <input class="form-control" id="firstname" type="text" name="firstname">
            <label class="form-label mt-3" for="lastname">Nom</label>
            <input class="form-control" id="lastname" type="text" name="lastname">
            <label class="form-label mt-3" for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email">
            <label class="form-label mt-3" for="password">Mot de passe</label>
            <input class="form-control" id="password" type="password" name="password">
            <button class="btn btn-primary mt-3 w-100" type="submit">S'inscrire</button>
        </form>
    </div>
</div>
</body>
</html>