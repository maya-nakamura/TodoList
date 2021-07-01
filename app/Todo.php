<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function tags() {
        return $this->belongsToMany("App\Tag", "merges", "todo_id", "tag_id");
    }
}
