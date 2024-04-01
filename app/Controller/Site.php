<?php

namespace Controller;

use Model\Bookinstance;
use Model\Post;
use Model\Reader;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;



class Site
{

    public function index(): string
    {
        $users = User::all();

        $bookinstances = Bookinstance::all();

        $readers = Reader::all();



        if (app()->auth::checkAdmin()):
            return new View('site.adminMain', ['users' => $users]);
        else :
            return new View('site.librarianMain', ['bookinstances' => $bookinstances, 'readers' => $readers]);
        endif;

    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }

    public function addlibrarian(): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.addLibrarianForm', ['message' => 'Добавление библиотекаря']);
    }

}
