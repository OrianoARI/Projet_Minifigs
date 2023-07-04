<?php

class Minifig
{

    private $name;
    private $ref;
    private $year;
    private $quantity;
    private $image;
    private $user_id;


    public function __construct($name, $ref, $year, $quantity, $image, $user_id)
    {
        $this->name = $name;
        $this->ref = $ref;
        $this->year = $year;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->user_id = $user_id;

        // var_dump($user_id);
        // // die();

    }

    //Accesseurs et Mutateurs

    public function setName($name)
    {
        $this->name = htmlspecialchars($name);
    }
    public function getName()
    {
        return $this->name;
    }

    public function setref($ref)
    {
        $this->ref = htmlspecialchars($ref);
    }
    public function getref()
    {
        return $this->ref;
    }

    public function setyear($year)
    {
        $this->year = htmlspecialchars($year);
    }
    public function getyear()
    {
        return $this->year;
    }
    public function setquantity($quantity)
    {
        $this->quantity = htmlspecialchars($quantity);
    }
    public function getquantity()
    {
        return $this->quantity;
    }

    public function setimage($image)
    {
        $this->image = htmlspecialchars($image);
    }
    public function getimage()
    {
        return $this->image;
    }

    public function setUserId($user_id)
    {
        $this->user_id = htmlspecialchars($user_id);
    }
    public function getUserId()
    {
        return $this->user_id;
    }


    public function getAttributes()
    {
        return [$this->name, $this->ref, $this->year, $this->quantity, $this->image, $this->user_id];
    }

    public function getColumns()
    {
        return ["name", "ref", "year", "quantity", "image", "user_id"];
    }


    public function save()
    {
        MinifigRepository::saveMinifig($this);
    }

    public function minifigValidator($name, $ref, $year, $quantity, $image)
    {
        // Initialisation d'un tableau pour stocker les éventuelles erreurs de validation
        $errors = [];

        // Vérification du nom
        if (empty($name)) {
            $errors[] = "Le nom est requis.";
        } elseif (!preg_match('/^[A-Za-zéèêëïîç\-\' ]+$/', $name)) {
            $errors[] = "Vous utilisez des caractères non autorisés.";
        }
        // Vérification de la référence
        if (empty($ref)) {
            $errors[] = "La référence est requise.";
        }
        // Vérification de l'année
        if (empty($year)) {
            $errors[] = "L'année est requise.";
        } elseif (!preg_match('/^\d{4}$/', $year)) {
            $errors[] = "Le format de l'année n'est pas valide.";
        }
        // Vérification de la quantité
        if (empty($quantity)) {
            $errors[] = "La quantité possédée est requise.";
        } elseif (!preg_match('/^\d+$/', $quantity)) {
            $errors[] = "Le format de la quantité n'est pas valide.";
        }
        // Vérification de l'image
        if (empty($image)) {
            $errors[] = "L'image est requise.";
        } elseif (!preg_match('/\.(jpg|jpeg|png|gif)$/i', $image)) {
            $errors[] = "Votre fichier doit être une image.";
        }
        // Retourner le tableau d'erreurs
        return $errors;
    }
}
