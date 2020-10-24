<?php
if(isset($_SESSION['user'])) {
    if($_SESSION['user']->getRole() === 'admin') {
        require 'Views/AdminView.php';
    } else {
        header('Location: router.php?controller=client');
    }
} else {
    require 'Views/LoginView.php';
}
