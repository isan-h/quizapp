<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    // READ ALL
    public function index()
    {
        $listOfGroupes = Groupe::paginate(5);
        return view('ReadGroupes', compact('listOfGroupes'));
    }

    // SHOW CREATE FORM
    public function create()
    {
        return view('CreateGroupe');
    }

    // STORE NEW GROUPE
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:groupes,nom',
        ]);

        Groupe::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('groupes.index')
            ->with('success', 'Groupe créé avec succès!');
    }

    // SHOW EDIT FORM
    public function edit($id)
    {
        $groupe = Groupe::find($id);
        return view('UpdateGroupe', compact('groupe'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $groupe = Groupe::find($id);

        $request->validate([
            'nom' => 'required|unique:groupes,nom,' . $id,
        ]);

        $groupe->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('groupes.index')
            ->with('success', 'Groupe modifié avec succès!');
    }

    // DELETE
    public function destroy($id)
    {
        Groupe::destroy($id);

        return redirect()->route('groupes.index')
            ->with('success', 'Groupe supprimé avec succès!');
    }
}
