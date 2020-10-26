<?php
require_once 'Utils/Db.php';
require_once 'Models/User.php';
require_once 'Models/Client.php';
require_once 'Models/Admin.php';
require_once 'Models/Post.php';
require_once 'Models/Category.php';
require_once 'Models/SearchQuery.php';
require_once 'Logic/Interfaces/InterfaceUser.php';
require_once 'Logic/Implementations/UserImplementation.php';

session_start();

if(isset($_GET['controller'])) {

    switch ($_GET['controller']) {
        case 'client':
            require 'Controllers/ClientController.php';
            break;
        case 'admin':
            require 'Controllers/AdminController.php';
            break;
        case 'login':
            require 'Controllers/LoginController.php';
            break;
        case 'search':
            require 'Controllers/SearchController.php';
            break;
        case 'block-user':
            require 'Controllers/BlockUserController.php';
            break;
        case 'add-post':
            require 'Controllers/AddPostController.php';
            break;
        default:
            echo '404 Not Found';
    }

}
