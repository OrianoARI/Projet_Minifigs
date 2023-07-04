<?php


class User {
    private $name;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($name, $email, $password, $confirmPassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }


     //Accesseurs et Mutateurs

  public function setName($name){ $this->name = htmlspecialchars($name); }
  public function getName(){ return $this->name; }

  public function setEmail($email){ $this->email = htmlspecialchars($email); }
  public function getEmail(){ return $this->email; }

  public function setPassword($password){ $this->password = htmlspecialchars($password); }
  public function getPassword(){ return $this->password; }

  public function setConfirmPassword($confirmPassword){ $this->confirmPassword = htmlspecialchars($confirmPassword); }
  public function getConfirmPassword(){ return $this->confirmPassword; }



  public function getAttributes(){
    return [$this->name, $this->email, $this->password,  $this->confirmPassword];
  }

  public function getColumns(){
    return ["name", "email", "password", "confirmPassword"];
  }

  public function save(){
        UserRepository::saveUser($this);
    }

    public function userValidator($name, $email, $password, $confirmPassword){
    // Initialisation d'un tableau pour stocker les éventuelles erreurs de validation
   $errors = [];

    // Vérification du nom
    if (empty($name)) {
        $errors[] = "Le nom est requis.";
    } elseif (!preg_match('/^[A-Za-zéèêëïîç\-\' ]+$/', $name)) {
        $errors[] = "Vous utilisez des caractères non autorisés.";
    }
    // Vérification de l'email
    if (empty($email)) {
        $errors[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Cette adresse email n'est pas valide.";
    }
    // Vérification du mot de passe
    if (empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }// elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d\s])(?!.*[<>;]).{8,}$/', $password)) {
        //$errors[] = "Le mot de passe n'est pas valide.";
   // }
    // Vérification de la confirmation du mot de passe
    if (empty($confirmPassword)) {
        $errors[] = "La confirmation du mot de passe est requise.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne sont pas identiques.";
    }
    // Retourner le tableau d'erreurs
    return $errors;
    }
}
?>