<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createStudentAccounts()
    {

        $etudiants = Etudiant::all();
        $password = 'Abc123456';

        foreach ($etudiants as $etudiant) {
            $user = new User();
            $user->name = $etudiant->nom;
            $user->email = $etudiant->email;
            $user->password = Hash::make($password);
            $user->save();
        }
    }
}
