<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return $tag->get();
    }
}
