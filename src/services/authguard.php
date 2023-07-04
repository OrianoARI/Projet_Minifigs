// Vérifier si l'identifiant de l'utilisateur est enregistré dans la session
if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté
    echo "Utilisateur connecté. ID utilisateur : " . $_SESSION['user_id'];
} else {
    // L'utilisateur n'est pas connecté
    echo "Utilisateur non connecté.";
    header('location: ./src/views/pages/register.php');
}