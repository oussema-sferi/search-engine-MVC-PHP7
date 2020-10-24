<?php
use Implementations\UserImplementation;
if(isset($_SESSION['user'])) {
    if($_SESSION['user']['role'] === 'client') {
        header('Location: router.php?controller=client');
    } elseif ($_SESSION['user']['role'] === 'admin') {
        header('Location: router.php?controller=admin');
    }
 /*   if(isset(($_SESSION['user'])['role'] === 'client')) {
        header('Location: router.php?controller=client');
    } elseif ($_SESSION['user']['role'] === 'admin') {
        header('Location: router.php?controller=admin');
    }
 */
   // print_r($_SESSION);

} else {

    if(isset($_POST['username']) && isset($_POST['password'])) {
         UserImplementation::Login($_POST['username'], $_POST['password']);
    } else {
        require 'Views/LoginView.php';
    }

}