<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'published_at'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
