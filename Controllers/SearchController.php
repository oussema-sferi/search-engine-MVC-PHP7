<?php

use Implementations\UserImplementation;


//echo $_POST['query'] . "<br>" . $_POST['category'] . "<br>" . $_POST['creation-date'] . "<br>" . $_POST['update-date'];
//var_dump($_POST);
$criteriaArray = new ArrayObject();
$criteriaArray= [$_POST['category'],$_POST['creation-date'],$_POST['update-date']];
//var_dump($criteriaArray);
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->getRole() === 'client') {
        $searchResults = UserImplementation::GetPostsByCriteria($_POST['query'], $criteriaArray);
        require 'Views/SearchResultsView.php';

    } elseif ($_SESSION['user']->getRole() === 'admin') {
        header('Location: router.php?controller=admin');
    }
} else {
    require 'Views/LoginView.php';
}