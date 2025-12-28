<?php

namespace App\Http\Controllers;

use App\Models\modules;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function showAll()
    {
        $listOfmodules = modules::paginate(5);
        return view('modules', compact('Listmodules'));
    }
    public function show(Request $request)
    {
        $idModule = $request->id;
        $SelectedModule = modules::find($idModule);
        return view('showModule', compact('SelectedModule'));
    }

    public function update(Request $request)
    {
        $idModule = $request->id;
        $Module = modules::find($idModule);
        $Module->nom = $request->input('nom');
        $Module->description = $request->input('description');
        $Module->save();
        return redirect('/modules');
    }
    public function destroy(Request $request)
    {
        $idModule = $request->id;
        $Module = modules::find($idModule);
        $Module->delete();
        return redirect('/modules');
    }

    public function create(Request $request)
    {
        $Module = new modules();
        $Module->nom = $request->input('nom');
        $Module->description = $request->input('description');
        $Module->save();
        return redirect('/modules')->with('success', 'Module créé avec succès!');
    }
    
}
