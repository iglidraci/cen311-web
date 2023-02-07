<?php

require_once 'core/BaseController.php';
require_once 'exceptions/UnauthorizedException.php';

class BooksController extends BaseController
{
    public function list() {
        // protected route, you should be authenticated
        if(!Application::$APP->isAuthenticated()) {
            throw new UnauthorizedException();
        }
        // obviously you will have to create a Book model, make query to the database and then display them
        $books = ['Brothers Karamazov', '1984', 'On Anarchy', 'The notes from the underground'];
        return Application::$APP->getRouter()->renderView('books', ['books' => $books]);
    }
}