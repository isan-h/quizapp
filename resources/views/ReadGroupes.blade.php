<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Groupes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen text-white"
    style="background: radial-gradient(circle at top left, #1e1b4b, #0f172a);">

    <div class="container mx-auto p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-bold">Liste des Groupes</h2>
            <a href="{{ route('groupes.create') }}"
                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded">Créer Groupe</a>
        </div>

        @if(session('success'))
        <div class="bg-green-600 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white/10 rounded p-4 shadow-xl">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-500">
                        <th class="p-2">ID</th>
                        <th class="p-2">Nom</th>
                        <th class="p-2">Description</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($listOfGroupes as $groupe)
                    <tr class="border-b border-gray-700">
                        <td class="p-2">{{ $groupe->id }}</td>
                        <td class="p-2">{{ $groupe->nom }}</td>
                        <td class="p-2">{{ $groupe->description }}</td>

                        <td class="p-2 flex gap-2">
                            <a href="{{ route('groupes.edit', $groupe->id) }}"
                                class="px-3 py-1 bg-green-600 rounded">Modifier</a>

                            <form method="POST" action="{{ route('groupes.destroy', $groupe->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center p-3">Aucun groupe trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">{{ $listOfGroupes->links() }}</div>
        </div>
    </div>

</body>

</html>