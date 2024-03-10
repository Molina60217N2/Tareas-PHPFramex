<?php 
require_once('./models/Book.php');

class BookController extends Controller {
    public function index() {  
        return view('book/index',
         ['books'=>Book::all(),
          'title'=>'Página principal de Libros']);
      }
      public function show($id) {
        $book = Book::find($id);
        return view('book/show',
          ['book'=>$book,
           'title'=>'Book Detail']);
      }
}