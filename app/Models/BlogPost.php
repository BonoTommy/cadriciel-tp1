<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'body',
        'body_fr',
        'user_id'
    ];

    public function blogHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function blogPostSelect()
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return BlogPost::select(
            'id',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title"),
            DB::raw("(CASE WHEN body$lang IS NULL THEN body ELSE body$lang END) AS body")
        )
            ->orderby('created_at', 'desc')->get();
    }
}
