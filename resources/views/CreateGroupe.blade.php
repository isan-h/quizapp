<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer Groupe</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen text-white"
    style="background: radial-gradient(circle at top left, #1e1b4b, #0f172a);">

    <div class="container mx-auto p-6 max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Créer un Groupe</h2>

        <form method="POST" action="{{ route('groupes.store') }}"
            class="bg-white/10 p-6 rounded shadow-xl">
            @csrf

            <label class="block mb-3">Nom :</label>
            <input type="text" name="nom" class="w-full p-2 rounded text-black" required>

            <label class="block mt-4 mb-3">Description :</label>
            <textarea name="description" class="w-full p-2 rounded text-black"></textarea>

            <button class="mt-4 w-full p-2 bg-purple-600 hover:bg-purple-700 rounded">Créer</button>
        </form>
    </div>

</body>

</html>