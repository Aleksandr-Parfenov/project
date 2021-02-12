<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public static function register(Request $request)
    {
        if ($request->has('submit')) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $errors = [];
            if (!User::checkName($name)) {
                $errors[] = 'Имя не может быть кароче двух символов';
            }
            if (count($errors) == 0) {
                $result = User::register($name, $email, $password);
                return redirect('user/cabinet');
            }
        }
        return view('user.register');
    }

    public static function login(Request $request)
    {
        if ($request->has('submit')) {
            $email = $request->input('email');
            $password = $request->input('password');
            $errors = [];
            if (!User::checkEmail($email)) {
                $errors[] = 'Неверный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Неверный password';
            }
            if (count($errors) == 0) {
                //Если форма заполнена правильно проверяем существует ли пользователь
                $userId = User::checkUserData($email, $password);
                if ($userId > 0) {
                    //Если даннеы правильные запоминаем пользователя
                    User::auth($userId, $request);
                    //Перенаправляем пользователя в кабинет
//                    return redirect()->route('user/cabinet',['$id' => $userId]);
                    return redirect('user/cabinet')->with('status', $userId);
                } else {
                    return view('user.login', ['errors' => $errors]);
                }
            }
        }
        $id_user = $request->session()->get('id_user');
        if (!is_null($id_user)) {
            return redirect('user/cabinet');
        }
        return view('user.login');
    }

    public static function cabinet(Request $request)
    {
        if ($request->has('exit')) {
            $request->session()->forget('id_user');
        }
        $id_user = $request->session()->get('id_user');
        if (!is_null($id_user)) {
            return view('cabinet.index');
        }
        return redirect('user/login');
    }
}
