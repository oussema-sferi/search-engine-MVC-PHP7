<?php

use Implementations\UserImplementation;
var_dump($_SESSION['user']->getId());

var_dump($_POST);

UserImplementation::AddPost($_SESSION['user']->getId(),$_POST['category'], $_POST['content']);

header('Location: router.php?controller=client');
