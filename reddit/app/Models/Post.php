<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'community_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
    public function comentary()
    {
        return $this->hasMany(Comentary::class);
    }
    public function community()
    {
        return $this->belongsTo(Community::class, 'foreign_key');
    }
}
