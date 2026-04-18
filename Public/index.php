<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../Common/DependencyInjection.php';
DependencyInjection::boot();

// ====== ROUTE ======
$route = $_GET['route'] ?? 'user.loginForm';

// ====== PROTECCIÓN DE RUTAS ======
$publicRoutes = ['user.loginForm', 'user.login', 'user.create', 'user.store', 'user.bienvenida'];

if (!in_array($route, $publicRoutes) && !isset($_SESSION['user'])) {
    header("Location: ?route=user.loginForm");
    exit;
}

// ====== SWITCH ======
switch ($route) {

    // ===== CELULAR =====
    case 'celular.create':
        $controller = DependencyInjection::getCelularController();
        $controller->create();
        break;

    case 'celular.store':
        $controller = DependencyInjection::getCelularController('store');
        $controller->store();
        break;

    case 'celular.index':
        $controller = DependencyInjection::getCelularController();
        $controller->index();
        break;

    case 'celular.delete':
        $controller = DependencyInjection::getCelularController();
        $controller->delete();
        break;

    // ===== USER =====
    case 'user.create':
        $controller = DependencyInjection::getUserController();
        $controller->create();
        break;

    case 'user.store':
        $controller = DependencyInjection::getUserController('store');
        $controller->store();
        break;

    case 'user.index':
        $controller = DependencyInjection::getUserController();
        $controller->index();
        break;

    case 'user.loginForm':
        $controller = DependencyInjection::getUserController();
        $controller->loginForm();
        break;

    case 'user.login':
        $controller = DependencyInjection::getUserController();
        $controller->login();
        break;

    case 'user.logout':
        $controller = DependencyInjection::getUserController();
        $controller->logout();
        break;

    case 'user.promote':
        $controller = DependencyInjection::getUserController();
        $controller->promote();
        break;

    case 'user.destroy':
        $controller = DependencyInjection::getUserController();
        $controller->destroy();
        break;

    case 'user.bienvenida':
        $controller = DependencyInjection::getUserController();
        $controller->bienvenida();
        break;

    default:
        echo "Ruta no encontrada";
}