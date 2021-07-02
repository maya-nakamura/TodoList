<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Todo;
use App\Merge;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index')->with(['todos' => $todos]);  
    }
    public function show(Todo $todo){
        return view('show')->with(['todo' => $todo]);
    }
    public function create(){
        return view('create');
    }
}