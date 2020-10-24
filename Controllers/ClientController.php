<?php
if(isset($_SESSION['user'])) {
    if($_SESSION['user']->getRole() === 'client') {
        require 'Views/ClientView.php';
    } else {
        header('Location: router.php?controller=admin');
    }
} else {
    require 'Views/LoginView.php';
}

