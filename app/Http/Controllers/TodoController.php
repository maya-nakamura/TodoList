<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Tag;

class TodoController extends Controller
{
    public function index(){
        Todo::find(1)->tags;
        $test = Todo::find(1)->tags->tag;
        dd($test);
    }
}
