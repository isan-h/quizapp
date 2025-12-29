<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Profs;
use App\Models\Modules;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // READ all quizzes
    public function index()
    {
        $listOfQuizzes = Quiz::with(['prof', 'module'])->paginate(5);
        return view('ReadQuizzes', compact('listOfQuizzes'));
    }

    // SHOW single quiz + dropdowns
    public function show($id)
    {
        $SelectedQuiz = Quiz::findOrFail($id);
        $listOfProfs = Profs::all();
        $listOfModules = Modules::all();

        return view('UpdateQuiz', compact('SelectedQuiz', 'listOfProfs', 'listOfModules'));
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);

        // also fetch all modules and profs for dropdowns
        $profs = \App\Models\Profs::all();
        $modules = \App\Models\Modules::all();

        return view('UpdateQuiz', compact('quiz', 'profs', 'modules'));
    }


    // UPDATE quiz
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string',
            'duree' => 'required|integer',
        ]);

        $quiz = Quiz::findOrFail($id);

        $quiz->titre = $request->titre;
        $quiz->duree = $request->duree;
        $quiz->groupe_cible = $request->groupe_cible;
        $quiz->keyword = $request->keyword;
        $quiz->prof_id = $request->prof_id;
        $quiz->module_id = $request->module_id;

        $quiz->save();

        return redirect('/quizzes')->with('success', 'Quiz mis à jour avec succès!');
    }

    // DELETE quiz
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect('/quizzes')->with('success', 'Quiz supprimé avec succès!');
    }

    // CREATE quiz FORM + dropdowns
    public function create()
    {
        $listOfProfs = Profs::all();
        $listOfModules = Modules::all();
        return view('CreateQuiz', compact('listOfProfs', 'listOfModules'));
    }

    // STORE new quiz
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'duree' => 'required|integer',
        ]);

        $quiz = new Quiz();

        $quiz->titre = $request->titre;
        $quiz->duree = $request->duree;
        $quiz->groupe_cible = $request->groupe_cible;
        $quiz->keyword = $request->keyword;
        $quiz->prof_id = $request->prof_id;
        $quiz->module_id = $request->module_id;

        $quiz->save();

        return redirect('/quizzes')->with('success', 'Quiz créé avec succès!');
    }
}
