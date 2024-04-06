<?php
namespace Middlewares;

use Src\Auth\Auth;
use Route\Request;

class LibrarianMiddleware
{
    public function handle(Request $request){
        if(!Auth::checkLibrarian()){
            app()->route->redirect('/errorpage');
        }
    }
}