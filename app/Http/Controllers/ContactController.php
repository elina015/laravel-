<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
  public function submit(ContactRequest $req){

    //создаем обьект контакт
    $contact = new Contact();
    //обращаемся к этому обьекту, получаем значение инпут и устанавливаем его в значение name
    $contact->name = $req->input('name');
    $contact->email = $req->input('email');
    $contact->subject = $req->input('subject');
    $contact->message = $req->input('message');

    $contact->save();

    //переадресация на главную страницу, указываем на удачную сессию
    return redirect()->route('home')->with('success', 'Сообщение было добавлено!');


    //выводит введеную тему сообщения
    //dd($req->input('subject'));
    //валидация
    //$validation = $req->validate([
    //  'subject' => 'required|min:5|max:50',
    //  'message' => 'required|min:15|max:500'
  //  ]);
  }
    //
    public function allData(){
      $contact = new Contact;
      return view('messages', ['data' => $contact->simplePaginate(3)]);

      //take()возвращает количество записей
      //  return view('messages', ['data'=> $contact->orderBy('id', 'desc')->take(2)->get()]);
      //Выбираю все записи с темой Hello
      //return view('messages', ['data'=> $contact->where('subject', '=', 'Hello')->get()]);

      //в шаблоне messages могу обратиться к значению data со всеми записи из БД
      //return view('messages', ['data' => Contact::all()]);

      //обращаемся к таблице контакты
      //Создаем ообьект контакт на основе ммодели
      //$contact = new Contact;
      //функция all прописана в классе Model и мы к ней обращаемся при помощи наследования и получаем полностью все записи из таблицы Контакты
    //  dd($contact->all());
    }
    public function showOneMessage($id){
      $contact = new Contact;
      return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id){
      $contact = new Contact;
      return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req){

      //выбираем опр. записи и помещаем в обьект контакт
      $contact = Contact::find($id);
      //обращаемся к этому обьекту, обновляем значение инпут и устанавливаем его в значение name
      $contact->name = $req->input('name');
      $contact->email = $req->input('email');
      $contact->subject = $req->input('subject');
      $contact->message = $req->input('message');

      //Сохраняем
      $contact->save();

      //переадресация на главную страницу, указываем на удачную сессию
      return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено!');


}
      public function deleteMessage($id){
        Contact::find($id)->delete();
        //переадресация на главную страницу, указываем на удачную сессию
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено!');
      }
}
