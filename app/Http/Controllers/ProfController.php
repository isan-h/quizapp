<?php

namespace App\Http\Controllers;

use App\Models\Profs;

use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function showAll()
    {
        $listOfProfs = Profs::paginate(5);
        return view('ReadProfs', compact('listOfProfs'));
    }
    public function show(Request $request)
    {
        $idProf = $request->id;
        $SelectedProf = Profs::find($idProf);
        return view('UpdateProfs', compact('SelectedProf'));
    }

    public function update(Request $request)
    {
        $idProf = $request->id;
        $Prof = Profs::find($idProf);
        $Prof->nom = $request->input('nom');
        $Prof->email = $request->input('email');
        $Prof->telephone = $request->input('telephone');
        $Prof->save();
        return redirect('/profs');
    }
    public function destroy(Request $request)
    {
        $idProf = $request->id;
        $Prof = Profs::find($idProf);
        $Prof->delete();
        return redirect('/profs');
    }

    public function create()
    {
        return view('CreateProfs');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:profs,email',
            'mot_de_passe' => 'required',
            'telephone' => 'nullable'
        ]);
        Profs::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe,
            'telephone' => $request->telephone
        ]);
        return redirect()->route('profs.showAll')
            ->with('success', 'Professeur créé avec succès!');
    }
}
