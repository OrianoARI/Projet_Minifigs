<?php

class RegistrationController {

    public function __construct() {
        
    }

    public function registerUser()
    {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            
            // Création de l'instance de l'utilisateur avec les données du formulaire

            $user = new User($name, $email, $password, $confirmPassword);
            // Vérification s'il y a des erreurs
            $errors = $user->userValidator($name, $email, $password, $confirmPassword);
            if (!empty($errors)) {
                // Stockage des erreurs dans la variable de session
                $_SESSION['errors'] = $errors;
                // Redirection vers la page d'inscription avec les erreurs affichées
                header('Location: ./register');
                exit; // Terminer le script pour éviter l'exécution du reste du code
            }
            // Vérification si l'utilisateur existe en base
            $existingUser = UserRepository::getUserByMail($email);
            if ($existingUser != 0) {
                // L'utilisateur existe déjà dans la base de données
                $_SESSION["userExists"] = "Un utilisateur ayant cette adresse email existe déjà.";
                header('Location: ./register');
                exit;
            }
            // Insertion de l'utilisateur en base de données
            $user->save();
            echo "Données insérées en base"; // À retirer après vérification du fonctionnement
            header('Location: ./login.php');
        } catch (PDOException $error) {
            $_SESSION["errorInsert"] = "Erreur d'insertion de données en base";
            header('location: ./register.php');
        }
    }
}


