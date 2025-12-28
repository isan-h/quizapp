<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center text-white"
    style="background: radial-gradient(circle at top left, #1e1b4b, #0f172a);">

    <div class="p-6 w-full max-w-md bg-white/10 rounded-xl shadow-xl">

        <h2 class="text-2xl font-semibold mb-4 text-center">Modifier le Quiz</h2>

        <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
            @csrf
            @method('PUT')

            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="titre" value="{{ $quiz->titre }}">

            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="number" name="duree" value="{{ $quiz->duree }}">

            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="groupe_cible" value="{{ $quiz->groupe_cible }}">

            <input class="w-full p-3 mb-3 bg-white/5 border rounded"
                type="text" name="keyword" value="{{ $quiz->keyword }}">

            <!-- PROF DROPDOWN -->
            <select name="prof_id" class="w-full p-3 mb-3 bg-white/5 border rounded">
                <option value="">-- Choisir Prof --</option>
                @foreach($profs as $p)
                <option value="{{ $p->id }}" @if($quiz->prof_id == $p->id) selected @endif>
                    {{ $p->nom }}
                </option>
                @endforeach
            </select>

            <!-- MODULE DROPDOWN -->
            <select name="module_id" class="w-full p-3 mb-3 bg-white/5 border rounded">
                <option value="">-- Choisir Module --</option>
                @foreach($modules as $m)
                <option value="{{ $m->id }}" @if($quiz->module_id == $m->id) selected @endif>
                    {{ $m->nom }}
                </option>
                @endforeach
            </select>

            <label class="flex items-center mb-3">
                <input type="checkbox" name="is_active" {{ $quiz->is_active ? 'checked' : '' }} class="mr-2">
                Activer le quiz
            </label>

            <button class="w-full p-3 bg-green-600 hover:bg-green-700 rounded">Mettre à jour</button>

            <a href="{{ route('quizzes.index') }}" class="block mt-3 text-center p-2 border rounded hover:bg-white/10">
                Retour
            </a>

        </form>

    </div>

</body>

</html>