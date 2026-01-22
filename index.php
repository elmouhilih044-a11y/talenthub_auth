<?php

require_once '../config/config.php';
require_once '../config/database.php';
require_once '../src/Models/Role.php';
require_once '../src/Models/User.php';
require_once '../src/Controllers/AuthController.php';
require_once '../src/Controllers/CandidateController.php';
require_once '../src/Controllers/RecruiterController.php';
require_once '../src/Controllers/AdminController.php';
require_once '../src/Services/AuthService.php';
require_once '../src/Repositories/UserRepository.php';
require_once '../src/Repositories/RoleRepository.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace(BASE_URL, '', $uri);

$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/':
    case '':
        require_once '../src/Views/home.php';
        break;

    case '/register':
        $controller = new AuthController();
        if ($method === 'GET') {
            $controller->showRegisterForm();
        } else {
            $controller->register();
        }
        break;

    case '/login':
        $controller = new AuthController();
        if ($method === 'GET') {
            $controller->showLoginForm();
        } else {
            $controller->login();
        }
        break;

    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case '/candidate/dashboard':
        $controller = new CandidateController();
        $controller->dashboard();
        break;

    case '/recruiter/dashboard':
        $controller = new RecruiterController();
        $controller->dashboard();
        break;

    case '/admin/dashboard':
        $controller = new AdminController();
        $controller->dashboard();
        break;

    default:
        http_response_code(404);
        require_once '../src/Views/errors/404.php';
        break;
}