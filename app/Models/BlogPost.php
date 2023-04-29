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

    public function blogHasEtudiant() {
        return $this->hasOne('App\Models\Etudiant', 'id', 'user_id');
    }

    static public function blogPostSelect()
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';
        $caseTitle = "CASE WHEN title_fr IS NULL THEN title ELSE IFNULL(title$lang, title) END";
        $caseBody = "CASE WHEN body$lang IS NULL THEN body ELSE IFNULL(body$lang, body) END";

        return BlogPost::select(
            'id', 'user_id', 'created_at', 'updated_at',
            DB::raw("{$caseTitle} AS title, {$caseBody} AS body")
            // DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title, (CASE WHEN body$lang IS NULL THEN body ELSE body$lang END) AS body")
           // DB::raw("(CASE WHEN body$lang IS NULL THEN body ELSE body$lang END) AS body")
        )
            ->orderby('created_at', 'desc')->get();
    }

    static public function blogPostShow($id)
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return BlogPost::select(
            'id',
            'user_id',
            'created_at',
            'updated_at',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title"),
            DB::raw("(CASE WHEN body$lang IS NULL THEN body ELSE body$lang END) AS body")
        )
        ->where('id', $id)->first();
    }

    static public function blogPostMyPost($id)
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return BlogPost::select(
            'id',
            'user_id',
            'created_at',
            'updated_at',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title"),
            DB::raw("(CASE WHEN body$lang IS NULL THEN body ELSE body$lang END) AS body")
        )
            ->where('user_id', $id)
            ->orderby('created_at', 'desc')->get();
    }
}
