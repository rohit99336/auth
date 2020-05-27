<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\mail;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/f', function () {
    // return view('welcome');
    $to_name='rohit Kumar';
    $to_email='akash99336@gmail.com';
    $data=array('name'=>'rohit','body'=>'you are requested for the new password link -http://localhost:8000/home');
    Mail::send('mail', $data, function ($message) use($to_email,$to_name)
    {
        $message->from('akash99336@gmail.com', 'rohit');
        $message->sender('akash99336@gmail.com', 'akash');
        $message->to($to_email);
        // $message->cc('john@johndoe.com', 'John Doe');
        // $message->bcc('john@johndoe.com', 'John Doe');
        // $message->replyTo('john@johndoe.com', 'John Doe');
        $message->subject('webtesting mail');
        // $message->priority(3);
        // $message->attach('pathToFile');
    });

    echo "email has send";
});

Route::view('/', 'home');
Route::view('logon', 'login');

// Route::get('profile', function () {
//     if(session()->has('success'))
//     {
//         return view('profile');
//     }
//     else
//     {
//         return view('home');
//     }
// });
Route::view('reg', 'reg');

Route::group(['middleware' => ['logcheck']], function () {

    Route::view('forgetpw', 'forgetpw');
    Route::view('updatepw', 'updatepw');
    Route::post('regc','ClientController@registration');
    Route::post('login','ClientController@login');
    Route::post('logout','ClientController@logout');
    Route::post('forgetc','ClientController@forgetpw');
    Route::post('updatepwc','ClientController@updatepw');

});

