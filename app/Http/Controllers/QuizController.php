<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function showAll()
    {
        $listOfQuiz = Quiz::paginate(5);
        return view('Quiz', compact('ListQuiz'));
    }
    public function show(Request $request)
    {
        $idQuiz = $request->id;
        $SelectedQuiz = Quiz::find($idQuiz);
        return view('showQuiz', compact('SelectedQuiz'));
    }

    public function update(Request $request)
    {
        $idQuiz = $request->id;
        $Quiz = Quiz::find($idQuiz);
        $Quiz->nom = $request->input('titre');
        $Quiz->durree = $request->input('durree');
        $Quiz->groupe_cible = $request->input('groupe_cible');
        $Quiz->keyword = $request->input('keyword');
        $Quiz->save();
        return redirect('/Quiz');
    }
    public function destroy(Request $request)
    {
        $idQuiz = $request->id;
        $Quiz = Quiz::find($idQuiz);
        $Quiz->delete();
        return redirect('/Quiz');
    }

    public function create(Request $request)
    {
        $Quiz = new Quiz();
        $Quiz->nom = $request->input('titre');
        $Quiz->durree = $request->input('durree');
        $Quiz->groupe_cible = $request->input('groupe_cible');
        $Quiz->keyword = $request->input('keyword');
        $Quiz->save();
        return redirect('/Quiz')->with('success', 'Quiz créé avec succès!');
    }
}
