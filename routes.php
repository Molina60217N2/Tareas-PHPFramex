<?php

require_once('./models/Professor.php');
require_once('./controllers/ProfessorController.php');

require_once('./controllers/BookController.php');
require_once('./controllers/AuthorController.php');
require_once('./controllers/PublisherController.php');
    
    //BOOK'S ROUTES  
    Route::resource('/book', 'BookController');    
    Route::get('/','BookController@index');
    Route::get('/book/(:number)/delete','BookController@destroy');
    // Route::get('/books', 'BookController@index');
    // Route::get('/book/(:number)','BookController@show');
    
    //AUTHOR'S ROUTES
    Route::get('/authors','AuthorController@index');
    Route::get('/author/(:number)','AuthorController@show');

    //PUBLISHER'S ROUTES
    Route::get('/publishers','PublisherController@index');
    Route::get('/publisher/(:number)','PublisherController@show');

    //TESTING ROUTES

    //Esta ruta se encarga de rutear automaticamente el CRUD
    Route::resource('professor', 'ProfessorController');
    Route::get('/professor/(:number)/delete','ProfessorController@destroy');
    // Route::get('/professor/(:number)/edit','ProfessorController@edit');
    // Route::get('/professor/(:number)','ProfessorController@show');  
    Route::dispatch();
?>
