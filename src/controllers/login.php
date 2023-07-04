<?php

class LoginController {
    public function __construct() {
    }

    public function login() {
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            if (!empty($email) && !empty($password)) {
                 // Vérification si l'utilisateur existe en base
            $hashedPassword = UserRepository::getUserToLogin($email);
            $user_id = UserRepository::getUserId($email);
            if ($hashedPassword) {
                // L'utilisateur existe dans la base de données
                    if (password_verify($password, $hashedPassword)) {
                        $_SESSION['user_id'] = $user_id;
                        header('location: ./dashboard');
                        exit;
                    } else {
                        $_SESSION['wrongPassword'] = "Le mot de passe est incorrect";
                        header('location: ./login');
                        exit;
                    }
                } else {
                    $_SESSION["userExists"] = "L'adresse email est incorrecte.";
                    header('location: ./login');
                    exit;
                }
            } else {
                $_SESSION["logEmptyField"] = "Veuillez remplir tous les champs du formulaire.";
                header('location: ./login');
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorInsert"] = "Erreur d'insertion de données en base";
            header('location: ./login');
        }
    }
}

