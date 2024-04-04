<?php
  // file: controllers/ProfessorController.php

  require_once('./models/Professor.php');
  
  class ProfessorController extends Controller {
    
    public function index() {  
      return view('professor/index',
       ['professors'=>Professor::all(),
        'title'=>'Professors List']);
    }

    public function show($id) {
      $prof = Professor::find($id);
      return view('professor/show',
        ['professor'=>$prof,
         'title'=>'Professor Detail']);
    }

    public function create() {
      $prof = ['name'=>'','degree'=>'',
               'email'=>'','phone'=>''];
    return view('professor/create',
      ['title'=>'Professor Create',
      'professor'=>$prof,'courses'=>false,
      'show'=>false,'create'=>true,'edit'=>false]);
  }

  public function store($smth = null) {
    $name = Input::get('name');
    $degree = Input::get('degree');
    $email = Input::get('email');
    $phone = Input::get('phone');
    $prof = ['name'=>$name,'degree'=>$degree,
             'email'=>$email,'phone'=>$phone];
    DB::table('professor')->insert($prof);
    return redirect('/professor');
  }

  public function edit($prof_id) {
    $prof = DB::table('professor')->find($prof_id);
    return view('professor/edit',
      ['professor'=>$prof,
       'title'=>'Professor Edit','courses'=>false,
       'show'=>false,'create'=>false,'edit'=>true]);
  }

  public function update($_,$prof_id = null) {
    $name = Input::get('name');
    $degree = Input::get('degree');
    $email = Input::get('email');
    $phone = Input::get('phone');
    $prof = ['name'=>$name,'degree'=>$degree,
             'email'=>$email,'phone'=>$phone];
             echo($prof['degree']);
             return;
             return redirect('/professor');
             DB::table('professor')->update($prof_id,$prof);
    
  }

  public function destroy($prof_id) {  
    DB::table('professor')->delete($prof_id);
    return redirect('/professor');
  }

  }
?>