<?php
use Implementations\UserImplementation;

if(isset($_SESSION['user'])) {
    if($_SESSION['user']->getRole() === 'client') {
        $categories = UserImplementation::GetCategories();
        $posts = UserImplementation::GetPosts();
        require 'Views/ClientView.php';
    } elseif ($_SESSION['user']->getRole() === 'admin') {
        header('Location: router.php?controller=admin');
    }
} else {
    require 'Views/LoginView.php';
}

