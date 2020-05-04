<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Создадим экшен  индекс
    public function index()
    {
    //vozvrawaet index iz papki tasks
    return view  ('tasks.index');
    }
}
