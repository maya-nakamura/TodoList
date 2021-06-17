<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MergeController extends Controller
{
    public function index(Merge $merge)
    {
        return $merge->get();
    }
}
