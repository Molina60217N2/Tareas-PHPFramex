<?php 

require_once('./models/Publisher.php');

class PublisherController extends Controller {
    public function index() {
        return view('publisher/index', 
        ['publishers' => Publisher::all(),
        'title' => 'Página principal de Editoriales' ]
        );
    }
    public function show($id){
        $publisher = Publisher::find($id);
        return view('publisher/show',
          ['publisher'=>$publisher,
           'title'=>'Datos de la Editorial']);
    }
}