<?php 
require_once('./models/Book.php');
require_once('./models/Author.php');
require_once('./models/BookAuthor.php');
require_once('./models/BookPublisher.php');
require_once('./models/Publisher.php');

class BookController extends Controller {
    public function index() {  
      $books = Book::all();

      for ($i = 0; $i < sizeof($books); $i++) {
        $relAuth = BookAuthor::where('book_id', $books[$i]['id'])->first();
        $author = Author::where('id', $relAuth[0]['author_id'])->first();
        $books[$i]['author_name'] = $author[0]['author'];
      }
        return view('book/index',
         ['books'=>$books,
          'title'=>'Página principal de Libros',]);
    }
      public function show($id) {
        $book = Book::find($id);
        $relAuth = BookAuthor::where('book_id', $book[0]['id'])->first();
        $relPub = BookPublisher::where('book_id', $book[0]['id'])->first();
        $author = Author::where('id', $relAuth[0]['author_id'])->first();
        $publisher = Publisher::where('id', $relPub[0]['publisher_id'])->first();
        $book[0]['author_name'] = $author[0]['author'];
        $book[0]['author_id'] = $author[0]['id'];
        $book[0]['publisher_name'] = $publisher[0]['publisher'];
        $book[0]['publisher_id'] = $publisher[0]['id'];
        return view('book/show',
          ['book'=>$book,
           'title'=>'Book Detail']);
      }
}