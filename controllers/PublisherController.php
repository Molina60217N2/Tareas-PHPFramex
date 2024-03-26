<?php 

require_once('./models/Publisher.php');
require_once('./models/BookPublisher.php');
require_once('./models/Book.php');

class PublisherController extends Controller {
    public function index() {
        return view('publisher/index', 
        ['publishers' => Publisher::all(),
        'title' => 'Página principal de Editoriales' ]
        );
    }
    public function show($id){
        $publisher = Publisher::find($id);
        $relBook = BookPublisher::where('publisher_id', $id)->get();
        $books = [];
        for($i = 0; $i < sizeof($relBook); $i++){
            $book = Book::find($relBook[$i]['book_id']);
            $books[$i]['title'] = $book[0]['title'];
            $books[$i]['book_id'] = $book[0]['id'];
        }

        return view('publisher/show',
          ['publisher'=>$publisher,
          'books' => $books,
          'title'=>'Datos de la Editorial']);
    }
}