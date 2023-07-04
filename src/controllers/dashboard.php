<?php

class DashboardController
{

    public function __construct()
    {
    }


    public function addMinifig()
    {
        try {
            $name = $_POST['name'];
            $ref = $_POST['ref'];
            $year = $_POST['year'];
            $quantity = $_POST['quantity'];
            $user_id = $_SESSION['user_id'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                // Informations fichier
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_size = $_FILES['image']['size'];
                $file_type = $_FILES['image']['type'];
                // Déplacer le fichier vers le répertoire uploads
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/projetminifigs/assets/uploads/'; // Chemin vers le répertoire de stockage
                $image = $target_dir . basename($file_name);
                move_uploaded_file($file_tmp, $image);
                $image = "http://localhost/projetminifigs/assets/uploads/".$file_name;


                // todo gestion des erreurs de form dans le validator minifig



                // Création de l'instance minifig avec les données du formulaire

                $minifig = new Minifig($name, $ref, $year, $quantity, $image, $user_id);


                // Vérification s'il y a des erreurs
                $errors = $minifig->minifigValidator($name, $ref, $year, $quantity, $image, $user_id);
                if (!empty($errors)) {
                    // Stockage des erreurs dans la variable de session
                    $_SESSION['errors'] = $errors;
                    // Redirection vers la page d'inscription avec les erreurs affichées
                    header('Location: ./dashboard'); //afficher une modal pour les erreurs
                    exit; // Terminer le script pour éviter l'exécution du reste du code
                }
                // Vérification si l'utilisateur possède déjà la minifig
                // $existingUser = UserRepository::getUserByMail($email);
                // if ($existingUser != 0) {
                //     // L'utilisateur existe déjà dans la base de données
                //     $_SESSION["userExists"] = "Un utilisateur ayant cette adresse email existe déjà.";
                //     header('Location: ./register');
                //     exit;
                // }
                // Insertion de l'utilisateur en base de données

                $minifig->save();
                echo "Données insérées en base"; // À retirer après vérification du fonctionnement
                header('Location: ./dashboard');
            }
        } catch (PDOException $error) {
            $_SESSION["errorInsert"] = "Erreur d'insertion de données en base";
            header('location: ./register.php');
        }
    }

    public function displayMinifigs()
    {

        // Vérifier si l'utilisateur est connecté et obtenir son identifiant d'utilisateur
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            $minifigs = MinifigRepository::getMinifigByUserId($userId);

            return $minifigs;

            // Utiliser l'identifiant de l'utilisateur pour récupérer les minifigs associées



        } else {
            // L'utilisateur n'est pas connecté, rediriger vers la page de connexion ou afficher un message d'erreur
            return [];
        }
    }
}
