<?php

namespace Implementations;

use Database\Db;
use Entities\Admin;
use Entities\Client;
use Entities\Category;
use Interfaces\InterfaceUser;
use DateTime;
use ArrayObject;


class UserImplementation implements InterfaceUser {

    public static function Login(string $username, string $password): bool
    {
        $db=Db::getInstance();
        $sql=" SELECT * FROM user WHERE username = :username and password = :password";
        $query=$db->prepare($sql);
        $query->bindParam(':username',$username);
        $query->bindParam(':password',$password);
        $query->execute();
        $result = $query->fetchAll();
        if (count($result) === 1) {
            if($result[0]['role'] === 'client') {
                $client = new Client();
                $client->setId($result[0]['id']);
                $client->setUsername($result[0]['username']);
                $client->setPassword($result[0]['password']);
                $client->setFullName($result[0]['fullname']);
                $client->setBirthDate(new DateTime($result[0]['birth_date']));
                $client->setIsActive($result[0]['is_active']);
                $client->setRole($result[0]['role']);
                $client->setLastConnection(new DateTime($result[0]['last_connection']));
                $client->setQueriesNumber($result[0]['queries_number_client']);
                $_SESSION['user'] = $client;
                //echo ($_SESSION['user']['role']);
            } elseif ($result[0]['role'] === 'admin') {
                $admin = new Admin();
                $admin->setId($result[0]['id']);
                $admin->setUsername($result[0]['username']);
                $admin->setPassword($result[0]['password']);
                $admin->setFullName($result[0]['fullname']);
                $admin->setBirthDate(new DateTime($result[0]['birth_date']));
                $admin->setIsActive($result[0]['is_active']);
                $admin->setRole($result[0]['role']);
                $admin->setLastConnection(new DateTime($result[0]['last_connection']));
                $_SESSION['user'] = $admin;
                //var_dump($_SESSION['user']);
            }

            return true;

        }
        return false;

    }

    public static function GetCategories(): ArrayObject
    {
        $db=Db::getInstance();
        $finalResult= new ArrayObject();
        $sql=" SELECT * FROM category";
        $query = $db->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $item) {
            $category = new Category($item['label']);
            $finalResult->append($category);
        }
        return $finalResult;
        //echo $finalResult[0]->getLabel();
    }
}
