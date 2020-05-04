<!--указываем путь из какого файла наследуем-->
@extends('layouts.app')

<!--указываем в какую секцию будет встраивать шаблон кода-->
@section('title-block')Контакты@endsection

@section('content')
<h1> Контакты </h1>



<form action="{{ route('contact-form')}}" method="post">
<!-- Скрытое поле защищенный ключ безопасности-->
@csrf

  <div class="form-group">
    <label for="name">Введите имя</label>
    <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
  </div>

  <div class="form-group">
    <label for="name">Введите email</label>
    <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
  </div>

  <div class="form-group">
    <label for="subject">Тема сообщения</label>
    <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">
  </div>

  <div class="form-group">
    <label for="message">Сообщение</label>
    <textarea name="message" id="message" class="form-control"  placeholder="Введите сообщение..." rows="8" cols="80"></textarea>
  </div>

  <button type="submit" class="btn btn-success"> Отправить </button>
</form>

@endsection
