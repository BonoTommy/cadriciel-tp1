<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'title_fr', 'file', 'etudiant_id'];

    public function repertoireHasEtudiant()
    {
        return $this->hasOne('App\Models\Etudiant', 'id', 'etudiant_id');
    }

    static public function fileTitleSelect()
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return BlogPost::select(
            'id',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title")
        )
            ->orderby('created_at', 'desc')->get();
    }
}
