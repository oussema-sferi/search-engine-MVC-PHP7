<?php

namespace Implementations;

use Database\Db;
use Entities\Admin;
use Entities\Client;
use Entities\Category;
use Entities\Post;
use Entities\SearchQuery;
use Interfaces\InterfaceUser;
use DateTime;
use ArrayObject;


class UserImplementation implements InterfaceUser
{

    public static function Login(string $username, string $password): bool
    {
        $db = Db::getInstance();
        $sql = " SELECT * FROM user WHERE username = :username and password = :password";
        $query = $db->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();
        $result = $query->fetchAll();
        if (count($result) === 1) {
            if ($result[0]['role'] === 'client') {
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
        $db = Db::getInstance();
        $finalResult = new ArrayObject();
        $sql = " SELECT * FROM category";
        $query = $db->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $item) {
            $category = new Category($item['id'], $item['label']);
            $finalResult->append($category);
        }
        return $finalResult;
        //echo $finalResult[0]->getLabel();
    }

    public static function GetPosts(): ArrayObject
    {
        $db = Db::getInstance();
        $finalResult = new ArrayObject();
        $sql = " SELECT * FROM post";
        $query = $db->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $item) {
            $post = new Post($item['id'], $item['content'], $item['created_at'], $item['updated_at']);
            $finalResult->append($post);
        }
        return $finalResult;

    }

   //$criteriaArray=[content,category,created_at,updated_at]

    public static function GetPostsByCriteria(string $content, array $criteriaArray):ArrayObject
    {
        $db = Db::getInstance();
        $finalResult = new ArrayObject();
        //$newSql=" AND (category=" . $criteriaArray['category'] . ") AND (created_at=" . $criteriaArray['creation-date'] . ") AND (updated_at=" . $criteriaArray['update-date'] . ")";

        $sql = "SELECT * FROM post WHERE (content LIKE '%$content%')";
        $query = $db->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $item) {
            $post = new Post($item['id'], $item['content'], $item['created_at'], $item['updated_at']);
            $finalResult->append($post);
        }
        return $finalResult;
    }

    public static function GetAllUsers():ArrayObject
    {
        $db=Db::getInstance();
        $finalResult = new ArrayObject();
        $sql="SELECT * FROM user WHERE (role = 'client')";
        $query=$db->query($sql);
        $result=$query->fetchAll();
        foreach ($result as $item) {
           // $client = new Client($item['id'], $item['fullname'], $item['birth_date'], $item['is_active'], $item['last_connection'],$item['queries_number_client']);
            $client = new Client();
            $client->setId($item['id']);
            $client->setFullName($item['fullname']);
            $client->setUsername($item['username']);
            $client->setBirthDate(new DateTime($item['birth_date']));
            $client->setIsActive($item['is_active']);
            $client->setLastConnection(new DateTime($item['last_connection']));
            $client->setQueriesNumber($item['queries_number_client']);

            $finalResult->append($client);
        }
       return $finalResult;
        var_dump($finalResult);
    }

    public static function BlockUser(int $id): void
    {
        $db=Db::getInstance();
        $sql="UPDATE user SET is_active=0 WHERE id=$id";
        $db->query($sql);

    }

    public static function AddPost(int $userId, int $categoryId, string $content): void
    {
        $db=Db::getInstance();
        $sql="INSERT INTO post (client_id,category_id,content, created_at,updated_at) VALUES ('$userId','$categoryId','$content', NOW(), NOW())";
        $db->query($sql);
    }

    public static function GetSearchQueries(): ArrayObject
    {
        $db=Db::getInstance();
        $finalResult = new ArrayObject();
        $sql="SELECT * FROM search_query";
        $query=$db->query($sql);
        $result=$query->fetchAll();
        foreach ($result as $item) {
            $searchQuery = new SearchQuery($item['id'], $item['content'], $item['criteria']);
            $finalResult->append($searchQuery);
        }
        return $finalResult;
    }
}
