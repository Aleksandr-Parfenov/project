<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class User extends Model
{
    public $timestamps = false;
    public static function checkName($name)
    {
        return strlen($name) >= 2 ? true : false;
    }

    public static function register($name, $email, $password)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return true;
    }

    public static function checkEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    public static function checkPassword($password)
    {
        return strlen($password) >= 4 ? true : false;
    }

    public static function checkUserData($email, $password)
    {
        $user = User::where('email', '=', $email)->first();
        if (!is_null($user)) {
            return $user->id;
        }
        return false;
    }

    public static function auth($userId, Request $request)
    {
        $request->session()->put('id_user', $userId);
        return true;
    }
}
