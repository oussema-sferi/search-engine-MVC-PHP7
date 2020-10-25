<?php
//echo $_POST['query'] . "<br>" . $_POST['category'] . "<br>" . $_POST['creation-date'] . "<br>" . $_POST['update-date'];
//var_dump($_POST);
if(isset($_SESSION['user'])) {
    if($_SESSION['user']->getRole() === 'client') {
        require 'Views/SearchResultsView.php';

    } elseif ($_SESSION['user']->getRole() === 'admin') {
        header('Location: router.php?controller=admin');
    }
} else {
    require 'Views/LoginView.php';
}