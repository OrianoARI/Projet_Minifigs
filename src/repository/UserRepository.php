<?php

class UserRepository {

public static function saveUser($user) {
    $userTable =[];   
    $userTable['name'] = $user->getName();
    $userTable['email'] = $user->getEmail();
    $userTable['password'] = $user->getPassword();

    $userTable['password'] = password_hash($userTable['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $userTable['name']);
    $stmt->bindParam(':email',$userTable['email']);
    $stmt->bindParam(':password', $userTable['password']);
    $stmt->execute();  
}

static function getUserByMail($email) {

    $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO

    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetchColumn();
    return $user;
}

static function getUserToLogin($email) {

    $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO

    $sql = "SELECT password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $hashedPassword = $stmt->fetchColumn();
    return $hashedPassword;
}

static function getUserId($email) {

    $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user_id = $stmt->fetchColumn();
    return $user_id;
}

}