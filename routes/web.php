<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/note/{note_id?}', function (\Illuminate\Http\Request $request, $noteId = null) {
    $noteController = new \App\Note\Classes\Controller\NoteController();
    $noteController->callMethodFromRequest($request);
    return 'teste';
});
