<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Calling view for user login
$app->get('/', function () use ($app) {
    return view('login');
});

// Calling Controller for verifying the user
$app->post('/verifyUser', [
  'as'=>'userVerification',
  'uses'=>'userController@verifyUser'
]);

// Adding namespace, prefix and midddleware to the routes related to dashboard of the user
$app->group(['namespace' => 'App\Http\Controllers', 'prefix'=>'dashBoard', 'middleware'=>'verify'], function($app){

  // Calling Controller to fetch all notes of a user
$app->get('/', [
  'as'=>'fetchNotes',
  'uses'=>'notesController@fetchNotes'
]);

// Calling Controller for getting a form for adding new note to DB
$app->get('/createNote', [
  'as'=>'addNewNote',
  'uses'=>'notesController@addNewNote'
]);

// Calling Controller for posting new note to DB
$app->post('/createNote', [
  'as'=>'postNewNote',
  'uses'=>'notesController@postNewNote'
]);

// Calling Controller for getting a form to edit a note
$app->post('/editNote', [
  'as'=>'editNote',
  'uses'=>'notesController@editNote'
]);

// Calling Controller for posting edited note to DB
$app->post('/updateNote', [
  'as'=>'postEditedNote',
  'uses'=>'notesController@udpateNote'
]);

// Calling Controller for deleting a note
$app->post('/deleteNote', [
  'as'=>'deleteNote',
  'uses'=>'notesController@deleteNote'
]);

// Calling controller for logout
$app->get('/logout', [
  'as'=>'logout',
  'uses'=>'userController@logout'
]);

});
