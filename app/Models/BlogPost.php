<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'body',
        'body_fr',
        'date',
        'user_id'
    ];

    public function blogHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
