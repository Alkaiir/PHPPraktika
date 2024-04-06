<?php

use function Route\routing;

routing(['GET', 'POST'],'/', [Controller\Site::class, 'index'])->add(['GET', 'POST'],'/', [Controller\Site::class, 'index'])->middleware('auth');
routing(['GET', 'POST'],'/login', [Controller\Site::class, 'login'])->add(['GET', 'POST'],'/login', [Controller\Site::class, 'login']);
routing(['GET', 'POST'],'/logout', [Controller\Site::class, 'logout'])->add(['GET', 'POST'],'/logout', [Controller\Site::class, 'logout'])->middleware('auth');
routing(['GET', 'POST'],'/addlibrarian', [Controller\Site::class, 'addLibrarian'])->add(['GET', 'POST'],'/addlibrarian', [Controller\Site::class, 'addLibrarian'])->middleware('auth', 'admin');
routing(['GET', 'POST'],'/addreader', [Controller\Site::class, 'addReader'])->add(['GET', 'POST'],'/addreader', [Controller\Site::class, 'addReader'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/allbooks', [Controller\Site::class, 'allBooks'])->add(['GET', 'POST'],'/allbooks', [Controller\Site::class, 'allBooks'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/allreaders', [Controller\Site::class, 'allReaders'])->add(['GET', 'POST'],'/allreaders', [Controller\Site::class, 'allReaders'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/popular', [Controller\Site::class, 'popular'])->add(['GET', 'POST'],'/popular', [Controller\Site::class, 'popular'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/addbookinstance', [Controller\Site::class, 'addBookInstance'])->add(['GET', 'POST'],'/addbookinstance', [Controller\Site::class, 'addBookInstance'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/addbook', [Controller\Site::class, 'addBook'])->add(['GET', 'POST'],'/addbook', [Controller\Site::class, 'addBook'])->middleware('auth', 'librarian');
routing(['GET', 'POST'],'/errorpage', [Controller\Site::class, 'errorPage'])->add(['GET', 'POST'],'/errorpage', [Controller\Site::class, 'errorPage']);


//Route::add(['GET', 'POST'], '/', [Controller\Site::class, 'index'])->middleware('auth');
//Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
//Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
//Route::add(['GET', 'POST'], '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
//Route::add(['GET', 'POST'], '/addlibrarian', [Controller\Site::class, 'addLibrarian'])->middleware('auth', 'admin');
//Route::add(['GET', 'POST'], '/addreader', [Controller\Site::class, 'addReader'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/allbooks', [Controller\Site::class, 'allBooks'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/allreaders', [Controller\Site::class, 'allReaders'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/popular', [Controller\Site::class, 'popular'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/addbook', [Controller\Site::class, 'addBook'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/addbookinstance', [Controller\Site::class, 'addBookInstance'])->middleware('auth', 'librarian');
//Route::add(['GET', 'POST'], '/errorpage', [Controller\Site::class, 'errorPage']);