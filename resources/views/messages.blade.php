<!--указываем путь из какого файла наследуем-->
@extends('layouts.app')

<!--указываем в какую секцию будет встраивать шаблон кода-->
@section('title-block')Все сообщенияа@endsection

@section('content')
<h1>Все сообщения</h1>
<!--реализуем вывод всех записсей, перебираем э-т data и каждый отдельный э-т помещаем в el-->
@foreach($data as $el)
  <div class="alert alert-info">
    
    <h3>{{$el->subject}}</h3>
    <p> {{$el->email}}</p>
    <p> <small> {{$el->created_at}}</small></p>
    <a href="{{route('contact-data-one', $el->id)}}"> <button class="btn btn-warning" type="button" name="button">Детальнее</button></a>
  </div>
@endforeach
<p> {{$data->links()}}</p>
@endsection
