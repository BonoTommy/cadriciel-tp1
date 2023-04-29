<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepertoireStoreRequest;
use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RepertoireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repertoires = Repertoire::fileTitleSelect();

        return view('repertoire.index', ['repertoires' => $repertoires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepertoireStoreRequest $request)
    {
        $file = $request->file('file')->store('repertoires');

        if ($request->title || $request->title_fr) {
            Repertoire::create([
                'title'     => $request->title,
                'title_fr'  => $request->title_fr,
                'file'      => $file,
                'etudiant_id'  => Auth::user()->id
            ]);
            return redirect(route('repertoire.index'))->withSuccess('File inserted');
        } else return redirect(route('repertoire.create'))->withErrors('File wasn\'t uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        $repertoire = Repertoire::fileTitleSelect()
            ->where('id', $repertoire->id)
            ->get();

        return view('repertoire.show', ['repertoire' => $repertoire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        return view('repertoire.edit', ['repertoire' => $repertoire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {
        if ($request->hasFile('file')) {
            Storage::delete($repertoire->file);
            $file = $request->file('file')->store('repertoires');
        }

        if (($request->title || $request->title_fr) && $request->file) {
            $repertoire->update([
                'title' => $request->title,
                'title_fr' => $request->title_fr,
                'file' => $file
            ]);
            return redirect(route('repertoire.index'))->withSuccess('Post updated');
        } else return redirect(route('repertoire.edit'))->withErrors('You must insert a title and a post in french or in english');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        Storage::delete($repertoire->file);
        $repertoire->delete();

        return redirect(route('repertoire.index'))->withSuccess('Post Deleted');
    }

    public function myDocs()
    {
        $repertoires = Repertoire::myDocsTable(Auth::user()->id);

        return view('repertoire.myDocs', ['repertoires' => $repertoires]);
    }
}
