<?php

use Src\Route;

Route::add(['GET', 'POST'], '/', [Controller\Site::class, 'index'])->middleware('auth');
//Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
Route::add(['GET', 'POST'], '/addlibrarian', [Controller\Site::class, 'addLibrarian'])->middleware('auth', 'admin');
Route::add(['GET', 'POST'], '/addreader', [Controller\Site::class, 'addReader'])->middleware('auth', 'librarian');
Route::add(['GET', 'POST'], '/allbooks', [Controller\Site::class, 'allBooks'])->middleware('auth', 'librarian');
Route::add(['GET', 'POST'], '/allreaders', [Controller\Site::class, 'allReaders'])->middleware('auth', 'librarian');
Route::add(['GET', 'POST'], '/popular', [Controller\Site::class, 'popular'])->middleware('auth', 'librarian');
Route::add(['GET', 'POST'], '/errorpage', [Controller\Site::class, 'errorPage']);