<?php

use Illuminate\Support\Facades\Route;

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
//шаблоны (странички которые в дальнейшем будет отслеживать)
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/contact/all/{id}',
          'ContactController@showOneMessage'
           )->name('contact-data-one');

/**Отслеживаие url адресма***/
 Route::get(
  '/contact/all/{id}/update',
  'ContactController@updateMessage'
   )->name('contact-update');

 /**Отслеживаие url адресма***/
    Route::post(
     '/contact/all/{id}/update',
     'ContactController@updateMessageSubmit'
      )->name('contact-update-submit');

  /**Отслеживаие url адресма***/
      Route::get(
      '/contact/all/{id}/delete',
      'ContactController@deleteMessage'
      )->name('contact-delete');

/**Отслеживаем то что перешел ли пользователь на страничку ***/
Route::get('/contact/all', 'ContactController@allData')->name('contact-data');

/***Когда мы будет переходит по урл /contact/submit при помощи метода безопасности
внутри этого контакта будет вызываться функция сабмит*/
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');

/***
Route::get('tasks', 'TaskController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
**/
Route::get('send', 'mailController@send');
