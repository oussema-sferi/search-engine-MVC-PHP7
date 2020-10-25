<?php

use Implementations\UserImplementation;

$userId=(array_keys($_POST)[0]);

UserImplementation::BlockUser($userId);

header('Location: router.php?controller=admin');
