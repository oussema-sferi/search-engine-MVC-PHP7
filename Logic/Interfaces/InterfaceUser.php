<?php

namespace Interfaces;

interface InterfaceUser {
    public static function Login(string $username, string $password):bool;
}