<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Todo $todo)
    {
        return $todo->get();
    }
}
