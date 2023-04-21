<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\EtudiantStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select()
            ->orderby('nom')
            ->paginate(10);
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtudiantStoreRequest $request)
    {
        $etudiant = DB::transaction(function () use ($request) {
            $user = User::create([
                'name'                  => $request->nom,
                'email'                 => $request->email,
                'password'              => Hash::make($request->password),
                'password_confirmation' => Hash::make($request->password_confirmation)
            ]);
            $etudiant = Etudiant::create([
                'id'                => $user->id,
                'nom'               => $request->nom,
                'adresse'           => $request->adresse,
                'phone'             => $request->phone,
                'email'             => $request->email,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id'          => $request->ville_id
            ]);

            if ($request->has('villes')) {
                $etudiant->villes()->attach($request->villes);
            }
            return $etudiant->id;
        });
        return redirect(route('etudiants.show', $etudiant))->withSuccess('Etudiant ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(EtudiantStoreRequest $request,  Etudiant $etudiant)
    {
        $user = User::find($etudiant->id);
        $etudiantId = DB::transaction(function () use ($request, $etudiant, $user) {
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->save();
            $etudiant->update([
                'nom'               => $request->nom,
                'adresse'           => $request->adresse,
                'phone'             => $request->phone,
                'email'             => $request->email,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id'          => $request->ville_id
            ]);

            if ($request->has('villes')) {
                $etudiant->villes()->attach($request->villes);
            }
            return $etudiant->id;
        });
        // $etudiant->update([
        //     'nom'               => $request->nom,
        //     'adresse'           => $request->adresse,
        //     'phone'             => $request->phone,
        //     'email'             => $request->email,
        //     'date_de_naissance' => $request->date_de_naissance,
        //     'ville_id'          => $request->ville_id
        // ]);

        return redirect(route('etudiants.show', $etudiantId))->withSuccess('Étudiant modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $user = User::find($etudiant->id);
        $user->delete();
        $etudiant->delete();
        return redirect(route('etudiants.index'))->withSuccess('Étudiant supprimé');
    }

    public function home()
    {
        return view('accueil');
    }
}
