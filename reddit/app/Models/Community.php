<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
