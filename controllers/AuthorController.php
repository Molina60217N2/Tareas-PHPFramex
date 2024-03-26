<?php

require_once('./models/Author.php');
require_once('./models/BookAuthor.php');
require_once('./models/Book.php');

class AuthorController extends Controller {
    
    public function index(){
        $authors = Author::all(); 
        return view('author/index', 
        ['authors' => $authors ,
        'title' => 'Página principal de Autores' ]
        );
    }

    public function show($id){
            $author = Author::find($id);
            $relBook = BookAuthor::where('author_id', $id)->get();
            $books = [];
            for($i = 0; $i < sizeof($relBook); $i++){
                $book = Book::find($relBook[$i]['book_id']);
                $books[$i]['title'] = $book[0]['title'];
                $books[$i]['book_id'] = $book[0]['id'];
            }


        return view('author/show',
          ['author'=>$author,
          'books' => $books,
          'title'=>'Datos del Autor',]);
    }
}