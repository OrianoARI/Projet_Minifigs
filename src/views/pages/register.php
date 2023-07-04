<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/projetminifigs/assets/css/style.css">
    <title>Inscription</title>
</head>

<body>
    <header>
    </header>
    <main>
        <div class="d-flex justify-content-center">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" aria-describedby="loginHelp">
                <div id="loginHelp" class="form-text">Votre mot de passe doit avoir au moins 8 carctères, 1 chiffre, 1 majuscule, 1 minuscule et 1 caractère spécial sauf <,>, ;, ', ", ?, \.</div>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirmation mot de passe</label>
                <input type="password" class="form-control" name="confirmPassword">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <button type="reset" class="btn btn-primary">Effacer</button>
        </form>
        </div>
        <!-- --------------------------------------------------------------------- -->
        <?php
        if (!empty($_SESSION["userExists"])) {
            echo '<p>' . $_SESSION["userExists"] . '</p>';
            unset($_SESSION["userExists"]);
        }
        if (!empty($_SESSION["errorInsert"])) {
            echo '<p>' . $_SESSION["errorInsert"] . '</p>';
            unset($_SESSION["errorInsert"]);
        }
        if (!empty($_SESSION["errors"])) {
            echo "bobo";
            echo "<div class='error-message'>";
            foreach ($_SESSION['errors'] as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo "</div>";
            unset($_SESSION["errors"]);
        }
        ?>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>