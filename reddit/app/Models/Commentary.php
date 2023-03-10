<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];


    public function post()
    {
        return $this->belongsTo(Post::class, 'foreign_key');
    }

}
