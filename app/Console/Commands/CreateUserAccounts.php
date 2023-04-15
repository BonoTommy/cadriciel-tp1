<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user-accounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creer un compte utilisateur avec chaque etudiant de la table etudiant';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        $this->info('Comptes utilisateurs créés avec succès!');
    }
}
