<?php
require_once "User.php";
session_start();

class Auth {

    public static function register($name, $email, $phone, $address, $password) {
        if (User::emailExists($email)) {
            return ["error" => "Email already registered."];
        }

        $id = User::createUser($name, $email, $phone, $address, $password);

        $_SESSION["user_id"] = $id;
        return ["success" => true, "user_id" => $id];
    }

    public static function login($email, $password) {
        $user = User::verifyLogin($email, $password);

        if (!$user) {
            return ["error" => "Invalid credentials."];
        }

        $_SESSION["user_id"] = $user["id"];
        return ["success" => true, "user" => $user];
    }

    public static function logout() {
        session_destroy();
    }

    public static function user() {
        if (!isset($_SESSION["user_id"])) return null;
        return User::find($_SESSION["user_id"]);
    }

    public static function check() {
        return isset($_SESSION["user_id"]);
    }
}
