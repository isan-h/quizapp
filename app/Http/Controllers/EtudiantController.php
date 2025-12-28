<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;


class EtudiantController extends Controller
{
    // Show all students with pagination
    public function index()
    {
        $ListEtudiants = Etudiant::paginate(5);
        return view('Etudiants', compact('ListEtudiants'));
    }

    // Show a single student by ID
    public function show(Request $request)
    {
        $idEtudiant = $request->id;
        $SelectedEtudiant = Etudiant::findOrFail($idEtudiant); // safer than find
        return view('showEtudiant', compact('SelectedEtudiant'));
    }

    // Update a student
    public function update(Request $request)
    {
        $idEtudiant = $request->id;
        $Etudiant = Etudiant::findOrFail($idEtudiant);

        $Etudiant->prenom = $request->input('prenom');
        $Etudiant->nom = $request->input('nom');
        $Etudiant->email = $request->input('email');
        $Etudiant->num_groupe = $request->input('num_groupe');

        $Etudiant->save();

        return redirect('/etudiants')->with('success', 'Étudiant mis à jour avec succès!');
    }

    // Delete a student
    public function destroy(Request $request)
    {
        $idEtudiant = $request->id;
        $Etudiant = Etudiant::findOrFail($idEtudiant);
        $Etudiant->delete();

        return redirect('/etudiants')->with('success', 'Étudiant supprimé avec succès!');
    }

    // Create a new student
    // public function create(Request $request)
    // {
    //     $Etudiant = new Etudiant();

    //     $Etudiant->prenom = $request->input('prenom');
    //     $Etudiant->nom = $request->input('nom');
    //     $Etudiant->email = $request->input('email');
    //     $Etudiant->num_groupe = $request->input('num_groupe');

    //     $Etudiant->save();

    //     return redirect('/etudiants')->with('success', 'Étudiant créé avec succès!');
    // }

    public function create()
    {
        return view('CreateEtudiants');
    }

    // Store a new student
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'num_groupe' => 'required',
            'mot_de_passe' => 'required'
        ]);

        Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe,
            'num_groupe' => $request->num_groupe
        ]);

        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant créé avec succès!');
    }
}
