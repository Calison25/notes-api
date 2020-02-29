<?php

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

Route::middleware('auth:api')->post('/note', function (Request $request){
    var_dump(\Illuminate\Support\Facades\Auth::check());
    echo "aqui?!";
    die;
});






//
//, function (\Illuminate\Http\Request $request, $noteId = null) {
//    echo "aqui?!";
//    die;
//    $noteController = new \App\Note\Classes\Controller\NoteController();
//    $noteController->callMethodFromRequest($request);
//    return 'teste';
//});
