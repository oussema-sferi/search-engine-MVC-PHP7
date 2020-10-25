<?php

namespace Interfaces;

use ArrayObject;

interface InterfaceUser {
    public static function Login(string $username, string $password):bool;
    public static function GetCategories():ArrayObject;
    public static function GetPosts():ArrayObject;
    public static function GetPostsByCriteria(string $content, array $criteriaArray):ArrayObject;
    public static function GetAllUsers():ArrayObject;
    public static function BlockUser(int $id):void;
}