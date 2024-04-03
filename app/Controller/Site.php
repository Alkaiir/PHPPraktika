<?php

namespace Controller;

use Model\Bookinstance;
use Model\Book;
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

    public function addReader(): string
    {
        if ($request->method === 'POST' && Reader::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.addReaderForm', ['message' => 'Добавление читателя']);
    }

    public function addBook(): string
    {
        if ($request->method === 'POST' && Book::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.addBookForm', ['message' => 'Добавление книги']);
    }

    public function addBookInstance(): string
    {
        $readers = Reader::all();
        $books = Book::all();

        if ($request->method === 'POST' && Bookinstance::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.addBookInstanceForm', ['message' => 'Выдача книги', 'books' => $books, 'readers' => $readers]);
    }

    public function allReaders(): string
    {
        $readers = Reader::all();
        $bookinstances = Bookinstance::all();

        return new View('site.allReaders', ['readers' => $readers, 'bookinstances' => $bookinstances] );
    }

    public function allBooks(): string
    {
        $books = Book::all();
        $bookinstances = Bookinstance::all();
        $readers = Reader::all();

        return new View('site.allBooks', ['books' => $books, 'bookinstances' => $bookinstances, 'readers' => $readers]);
    }

    public function popular(): string
    {

        $populars = [];
        $books = Book::all();
        foreach ($books as $book) {

            if ($book->instances_count > 0) {
                array_push($populars, $book);
            }
            asort($populars);
        }


        return new View('site.popular', ['populars' => $populars]);
    }

    public function errorPage(): string
    {
        return new View('site.errorPage');
    }


}
