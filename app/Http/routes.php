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

$app->get('/', function () use ($app) {
    //return $app->version();
    return view('index');
});

$app->get('api/guestbook','GuestbookController@index');
 
$app->get('api/guestbook/{id}','GuestbookController@getGuestbook');
 
$app->post('api/guestbook','GuestbookController@saveGuestbook');
 
$app->put('api/guestbook/{id}','GuestbookController@updateGuestbook');
 
$app->delete('api/guestbook/{id}','GuestbookController@deleteGuestbook');