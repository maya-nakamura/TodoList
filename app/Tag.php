<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tags() {
        return $this->belongsToMany("App\Todo", "Merge", "tag_id", "todo_id");
    }
}
