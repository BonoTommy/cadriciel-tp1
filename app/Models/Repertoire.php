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

        return Repertoire::select(
            'id', 'created_at', 'updated_at', 'file', 'etudiant_id',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title")
        )
            ->orderby('created_at', 'desc')
            ->paginate(20);
    }

    static public function myDocsTable($id)
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return Repertoire::select(
            'id',
            'created_at',
            'updated_at',
            'file',
            'etudiant_id',
            DB::raw("(CASE WHEN title$lang IS NULL THEN title ELSE title$lang END) AS title")
        )
            ->orderby('updated_at', 'desc')
            ->where('etudiant_id', $id)
            ->paginate(20);
    }

    static public function repertoireEditSelect($id)
    {
        $lang = session('localDB');
        session()->has('locale') && session()->get('locale') == 'fr' ? $lang = '_fr' : '';

        return Repertoire::select(
            'id',
            'created_at',
            'updated_at',
            'file',
            'etudiant_id',
            'title',
            'title_fr'
        )
            ->where('id', $id)
            ->first();
    }

}
