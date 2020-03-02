<?php

use App\Note\Classes\Controller\NoteController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->any('/note/{note_id?}', function (Request $request, $noteId = null) {
    $noteController = new NoteController();
    return $noteController->callMethodFromRequest($request, $noteId);
});
