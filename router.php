<?php

include_once 'app/controllers/products.controller.php';
include_once 'app/controllers/auth.controller.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new ProductsController();
        $controller->showItems();
        break;
    case 'watch':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->showDetail($id);
        break;
    case 'categorys':
        $controller = new ProductsController();
        $controller->showCategorys();
        break;
    case 'category':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->showProductsCategory($id);
        break;
    case 'login':
        $controller = new AuthContoller();
        $controller->showLogin();
        break;
    case 'register':
        $controller = new AuthContoller();
        $controller->showRegister();
        break;
    case 'new-user':
        $controller = new AuthContoller();
        $controller->createAccount();
        break;
    case 'verify':
        $controller = new AuthContoller();
        $controller->loginUser();
        break;
    case 'logout':
        $controller = new AuthContoller();
        $controller->logout();
        break;   
    case 'crudProducts':
        $controller = new ProductsController(); 
        $controller->crudItems();
        break;
    case 'deleteProduct':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->deleteProduct($id);
        break;
    case 'updateProduct':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->updateProduct($id);
        break;
    case 'doUpdate':
        $controller = new ProductsController(); 
        $controller->doUpdate();
        break;
    case 'newProduct':
        $controller = new ProductsController(); 
        $controller->newProduct();
        break;
    case 'crudCategorys':
        $controller = new ProductsController(); 
        $controller->crudCategorys();
        break;
    case 'newCategory':
        $controller = new ProductsController(); 
        $controller->newCategory();
        break;
    case 'deleteCategory':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->deleteCategory($id);
        break; 
    case 'updateCategory':
        $controller = new ProductsController();
        $id = $params[1];
        $controller->crudCategorys($id);
        break;
    case 'doUpdateCategory':
        $controller = new ProductsController(); 
        $controller->doUpdateCategory();
        break;
    default:
        echo('404 Page not found');
        break;
}