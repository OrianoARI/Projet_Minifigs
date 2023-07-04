
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/projetminifigs/assets/css/style.css">
    <title>connexion</title>
</head>

<body>
    <header>
    </header>
    <main>
        <div class="d-flex justify-content-center">
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        </div>
        <!-- --------------------------------------------------------------------- -->
        <?php
        if (!empty($_SESSION["userExists"])) {
            echo '<p>' . $_SESSION["userExists"] . '</p>';
            unset($_SESSION["userExists"]);
        }
        if (!empty ($_SESSION["logEmptyField"])) {
            echo '<p>' . $_SESSION["logEmptyField"] . '</p>';
            unset($_SESSION["logEmptyField"]);
        }
        if (!empty ($_SESSION['wrongPassword'])) {
            echo '<p>' . $_SESSION['wrongPassword'] . '</p>';
            unset($_SESSION['wrongPassword']);
        }
        
        ?>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>