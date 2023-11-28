<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\userController;
use App\Http\Controllers\myGameController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\adminController;

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



// access ----------------------------------------------------------------------

Route::get('/signin',[SessionController::class, 'index']);
Route::get('/signup',[SessionController::class, 'signupindex']);
Route::post('/signin_process',[SessionController::class, 'signin']);
Route::post('/signup/process',[SessionController::class, 'signup']);
Route::get('/signout_process',[SessionController::class, 'signout']);
Route::post('/forgotPassword/process',[SessionController::class, 'forgetpassword']);
Route::get('/reset_password/{token}',[SessionController::class, 'resetpassword']);
Route::post('/reset_password/process',[SessionController::class, 'resetpassprocess']);

Route::get('/PrivacyPolicy', function () {
    return view('legal.privacypolicy');
});

Route::get('/TermOfService', function () {
    return view('legal.termofservice');
});
Route::get('/forgotPassword', function () {
    return view('access.forgotpassword');
});

Route::get('/resetPassword', function () {
    return view('access.resetpassword');
});

// navbar items ----------------------------------------------------------------------

Route::get('/', [GameController::class, 'home']);
Route::get('/home', [GameController::class, 'home']);

Route::post('/search',[GameController::class, 'searchresult']);

Route::get(
    '/mygames',
    [myGameController::class,'showMyGames']
    )->middleware('check.login');

Route::get('/browse', function () {
    return redirect('/home#');
})->name('browse');

Route::get(
    '/profile',
    [userController::class, 'profile'])
    ->middleware('check.login');

Route::get(
    '/profile_edit',
    [userController::class, 'edit_profile'])
->middleware('check.login');

Route::POST('/profile_edit/process',[userController::class, 'save_edit'])->middleware('check.login');;
Route::POST('/profile_edit/changepp',[userController::class, 'save_profile'])->middleware('check.login');;

Route::get(
    '/delete_account',
    [userController::class, 'delete_profile'])
->middleware('check.login');

Route::get(
    '/games/{id}',
    [GameController::class, 'gameDetail']
);

Route::get(
    '/games/{id}/game_completed',
    [GameController::class, 'done']
)->middleware('check.login');

Route::get(
    'games/{id}/tambah_game',
    [myGameController::class, 'addGame']
)->middleware('check.login');

Route::get(
    'games/{id}/hapus_game',
    [myGameController::class, 'delGame']
)->middleware('check.login');

Route::post(
    'games/{id}/addrating',
    [GameController::class, 'addRating']
)->middleware('check.login');

// footer items ----------------------------------------------------------------------

Route::get('/teams', function () {
    return view('footer.teams');
});

Route::post('/sendmessage', [userController::class, 'sendEmail']);

// admin ----------------------------------------------------------------------

Route::get(
    '/admin',
    [adminController::class, 'index'])
    ->middleware('check.admin');
Route::get(
    '/admin/gameList',
    [adminController::class, 'gameList'])
    ->middleware('check.admin');
Route::get(
    '/admin/addGame',
    [adminController::class, 'addGame'])
    ->middleware('check.admin');
Route::post(
    '/admin/addGame/process',
    [adminController::class, 'addGameProcess'])
    ->middleware('check.admin');

Route::get(
    '/admin/userList',
    [adminController::class, 'userList'])
    ->middleware('check.admin');
Route::get(
    '/admin/editgame/{id}',
    [adminController::class, 'editGame'])
    ->middleware('check.admin');
Route::post(
    '/admin/editGame/{id}/process',
    [adminController::class, 'editGameProcess'])
    ->middleware('check.admin');

Route::get(
    '/admin/delete/{id}',
    [adminController::class, 'deleteGameConfirmation'])
    ->middleware('check.admin');
Route::get(
    '/admin/delete/{id}/process',
    [adminController::class, 'deleteGame'])
    ->middleware('check.admin');

Route::get(
    '/admin/comment',
    [adminController::class, 'commentView'])
->middleware('check.admin');

Route::get('/email', function () {
    return view('access.forgetpass-email');
})->middleware('check.admin');
