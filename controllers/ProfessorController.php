<?php
  // file: controllers/ProfessorController.php

  require_once('./models/Professor.php');
  
  class ProfessorController extends Controller {
    
    public function index() {  
      $books = DB::table('book') ->get();
      return view('professor/index',
       ['professors'=>Professor::all(),
        'Pagetitle'=>'Professors List',
        'books'=>$books]);
    }

    public function show($id) {
      $prof = Professor::find($id);
      return view('professor/show',
        ['professor'=>$prof,
         'title'=>'Professor Detail']);
    }
  }
?>