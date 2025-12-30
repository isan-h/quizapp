<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center text-white"
    style="background: radial-gradient(circle at top left, #1e1b4b, #0f172a);">

    <div class="p-6 w-full max-w-md bg-white/10 rounded-xl shadow-xl">

        <h2 class="text-2xl font-semibold mb-4 text-center">Créer un Quiz</h2>

        @if($errors->any())
        <div class="bg-red-600 p-3 rounded mb-3">
            @foreach($errors->all() as $error)
            <p>- {{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('quizzes.store') }}">
            @csrf
            <label for="">Titre du quiz</label>
            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="titre" placeholder="Titre du quiz">

            <label for="">Durée du quiz (min)</label>
            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="number" name="duree" placeholder="Durée (min)" value="10">

            <label for="">Groupe cible</label>
            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="groupe_cible" placeholder="Groupe cible">

            <label for="">Mot clé</label>
            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="keyword" placeholder="Mot clé">

            <!-- PROF DROPDOWN -->
            <label for="">Professeur</label>
            <select name="prof_id" class="w-full p-3 mb-3 bg-white/5 border rounded cursor-pointer">
                <option value="">-- Choisir Prof --</option>
                @foreach($listOfProfs as $p)
                <option value="{{ $p->id }}">{{ $p->nom }}</option>
                @endforeach
            </select>

            <!-- MODULE DROPDOWN -->
            <label for="">Module</label>
            <select name="module_id" class="w-full p-3 mb-3 bg-white/5 border rounded cursor-pointer">
                <option value="">-- Choisir Module --</option>
                @foreach($listOfModules as $m)
                <option value="{{ $m->id }}">{{ $m->nom }}</option>
                @endforeach
            </select>

            <label class="flex items-center mb-3">
                <input type="checkbox" name="is_active" checked class="mr-2">
                Activer le quiz
            </label>

            <button class="w-full p-3 bg-purple-600 hover:bg-purple-700 rounded">Créer</button>

            <a href="{{ route('quizzes.index') }}" class="block mt-3 text-center p-2 border rounded hover:bg-white/10">
                Retour
            </a>
        </form>
    </div>

</body>

</html>