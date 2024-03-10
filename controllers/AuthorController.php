<?php

require_once('./models/Author.php');

class AuthorController extends Controller {
    
    public function index(){
        return view('author/index', 
        ['authors' => Author::all(),
        'title' => 'Página principal de Autores' ]
        );
    }

    public function show($id){
        $author = Author::find($id);
        return view('author/show',
          ['author'=>$author,
           'title'=>'Datos del Autor',]);
    }
}