<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    //public function authorize(){
        //return false;
    //}
    public function rules()
    {
        return [
            'todo.title' => 'required|string|max:30',
            'todo.body' => 'required|string|max:100',
            'tag.tagname' => 'required|string|max:20',
            'todo.deadline' => 'required|date|after:yesterday',
        ];
    }
}
