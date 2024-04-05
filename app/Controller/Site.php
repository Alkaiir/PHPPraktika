<?php

namespace Controller;

use Model\Bookinstance;
use Model\Book;
use Model\Reader;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


class Site
{

    public function index(Request $request): string
    {
        $users = User::all();

        $bookinstances = Bookinstance::all();

        $readers = Reader::all();



        if (app()->auth::checkAdmin()):
            return new View('site.adminMain', ['users' => $users]);
        else :

            if ($request->method === 'POST') {
                $bookinstance_id = $request->all()['bookinstance_id'];
                $bookinstance_for_update = Bookinstance::where('bookinstance_id', $bookinstance_id);
                $bookinstance_for_update->update(['in_stock' => 1]);
                app()->route->redirect('/');
            }

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

    public function addlibrarian(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'email' => ['required'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.addLibrarianForm',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return new View('site.addLibrarianForm');

    }

    public function addReader(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'adress' => ['required'],
                'phone' => ['required'],
                'image' => ['size']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'size' => 'Изображение слишком большое'
            ]);

            if ($validator->fails()) {
                return new View('site.addReaderForm',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if ($_FILES['image']) {

                $image = $_FILES['image'];

                $root = app()->settings->getRootPath();

                $path = $_SERVER['DOCUMENT_ROOT'] . $root . '/public/img/';

                $name = mt_rand(0, 10000) . '_' . $image['name'];

                $tmp_name = $image['tmp_name'];

                move_uploaded_file($tmp_name, $path . $name);

                $reader_data = $request->all();

                $reader_data['image'] = $name;

                if (Reader::create($reader_data)) {
                    app()->route->redirect('/');
                }

            } else {
                if (Reader::create($request->all())) {
                    app()->route->redirect('/');
                }
            }

            }

        return new View('site.addReaderForm', ['message' => 'Добавление читателя', ]);
    }

    public function addBook(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'book_name' => ['required'],
                'publication_year' => ['required', 'year'],
                'price' => ['required'],
                'annotation' => ['required']
            ], [
                'required' => 'Поле :field пусто'
            ]);

            if ($validator->fails()) {
                return new View('site.add_book',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Book::create($request->all())) {
                app()->route->redirect('/');
            }

        }
        return new View('site.add_book', ['message' => 'Добавление книги']);
    }

    public function addBookInstance(Request $request): string
    {
        $readers = Reader::all();
        $books = Book::all();

        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'pick_date' => ['required'],
                'return_date' => ['required'],
                'book_name' => ['bookinstance']
            ], [
                'required' => 'Поле :field пусто'
            ]);

            if($validator->fails()){
                return new View('site.add_bookinstance',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'books' => $books, 'readers' => $readers]);
            }

            $book_avaible = 1;

            $book_instances = Bookinstance::all();

            foreach ($book_instances as $book_instance) {
                if ($book_instance->book_name === $request->all()['book_name']) {
                    if ($book_instance->in_stock === 0) {
                        $book_avaible = 0;
                    }
                }
            }


            if ($book_avaible === 1) {
                if (Bookinstance::create($request->all())) {
                    $selected_book = Book::where('book_name', $request->all()['book_name']);
                    $selected_book->increment('instances_count');
                    app()->route->redirect('/');
                }
            }


        }

        return new View('site.add_bookinstance', ['message' => 'Выдача книги', 'books' => $books, 'readers' => $readers]);
    }

    public function allReaders(): string
    {
        $readers = Reader::all();
        $bookinstances = Bookinstance::all();

        return new View('site.allReaders', ['readers' => $readers, 'bookinstances' => $bookinstances] );
    }

    public function allBooks(Request $request): string
    {
        $books = Book::all();
        $bookinstances = Bookinstance::all();
        $readers = Reader::all();

        if ($request->method === 'POST') {

            $sorted_books = [];

            $search_request = $request->all();
            foreach ($books as $book) {

                $lower_book_name = $book->book_name;
                $lower_book_name = mb_strtolower($lower_book_name);
                $lower_search_request = mb_strtolower($search_request['search']);

                if (str_contains($lower_book_name, $lower_search_request)) {
                    array_push($sorted_books, $book);
                }
            }
            return new View('site.allBooks', ['books' => $sorted_books, 'bookinstances' => $bookinstances, 'readers' => $readers]);
        }

        return new View('site.allBooks', ['books' => $books, 'bookinstances' => $bookinstances, 'readers' => $readers]);
    }

    public function popular(): string
    {

        $populars = Book::orderBy('instances_count', 'desc')->get();

        return new View('site.popular', ['populars' => $populars]);
    }

    public function errorPage(): string
    {
        return new View('site.errorPage');
    }


}
