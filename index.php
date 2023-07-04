<?php
session_start();

require_once('./config.php');
require_once('./src/controllers/dbConnect.php');
require_once('./src/controllers/register.php');
require_once('./src/controllers/login.php');
require_once('./src/controllers/dashboard.php');
require_once('./src/models/User.php');
require_once('./src/models/Minifig.php');
require_once('./src/repository/UserRepository.php');
require_once('./src/repository/MinifigRepository.php');

$registrationController = new RegistrationController();
$loginController = new LoginController();
$dashboardController = new DashboardController();


$actionParts = isset($_SERVER['REQUEST_URI']) ? (explode('/', $_SERVER['REQUEST_URI'])) : '';

// Extraire l'action à partir de l'URL
// var_dump($actionParts);
// die;

if (count($actionParts) >= 4) {
    $action = $actionParts[3];



    switch ($action) {
        case 'register':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $registrationController->registerUser();
            }
            include_once('./src/views/pages/register.php');
            break;
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $loginController->login();
            }
            include_once('./src/views/pages/login.php');
            break;
        case 'dashboard':
            $minifigs = $dashboardController->displayMinifigs();
            include_once('./src/views/pages/dashboard.php');
            break;
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dashboardController->addMinifig();
            }
            include_once('./src/views/pages/dashboard.php');
            break;
    }
}
