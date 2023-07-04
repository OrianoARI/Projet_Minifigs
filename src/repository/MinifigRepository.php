<?php

class MinifigRepository
{

    public static function saveMinifig($minifig)
    {

        $minifigTable = [];
        $minifigTable['name'] = $minifig->getName();
        $minifigTable['ref'] = $minifig->getRef();
        $minifigTable['year'] = $minifig->getYear();
        $minifigTable['quantity'] = $minifig->getQuantity();
        $minifigTable['image'] = $minifig->getImage();
        $minifigTable['user_id'] = $minifig->getUserId();


        $sql = "INSERT INTO minifigs (name, ref, year, quantity, image, user_id) VALUES (:name, :ref, :year, :quantity, :image, :user_id)";

        $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $minifigTable['name']);
        $stmt->bindParam(':ref', $minifigTable['ref']);
        $stmt->bindParam(':year', $minifigTable['year']);
        $stmt->bindParam(':quantity', $minifigTable['quantity']);
        $stmt->bindParam(':image', $minifigTable['image']);
        $stmt->bindParam(':user_id', $minifigTable['user_id']);
        $stmt->execute();
    }

    public static function getMinifigByUserId($userId)
    {
        $pdo = DbConnect::getPdo(); // Utilisation de la méthode statique pour obtenir l'objet PDO
        $sql = "SELECT * FROM minifigs WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $minifigs = $stmt->fetchAll();

        return $minifigs;
    }
}
