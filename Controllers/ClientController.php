<?php
use Implementations\UserImplementation;

if(isset($_SESSION['user'])) {
    if($_SESSION['user']->getRole() === 'client') {
        require 'Views/ClientView.php';
        UserImplementation::GetCategories();
    } elseif ($_SESSION['user']->getRole() === 'admin') {
        header('Location: router.php?controller=admin');
    }
} else {
    require 'Views/LoginView.php';
}

