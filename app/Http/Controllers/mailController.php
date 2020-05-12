<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    //Создаем метод
    public function send(){
      //Принимает 3 аргумента:имя, массив данных(имя отправителя), функция замыкания ...

      Mail::send(['text' => 'mail'],['name', 'Blog'], function($message){

        $message->to('elinabovcus@gmail.com', 'Blog')->subject('Test email');
        //from
        $message->from('elinabovcus@gmail.com', 'Blog');
    });
}
}
