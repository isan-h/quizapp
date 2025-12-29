<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Quizzes</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
        }

        .pagination li {
            list-style: none;
        }

        .pagination a,
        .pagination span {
            padding: 6px 10px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 14px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.2s;
        }

        .pagination a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .pagination .active span {
            background: #4f46e5;
            border-color: #4f46e5;
            color: white;
        }

        .pagination .disabled span {
            opacity: 0.3;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="min-h-screen text-white"
    style="background: radial-gradient(circle at top left, #1e1b4b, #0f172a);">

    <div class="container mx-auto p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-bold">Liste des Quizzes</h2>
            <a href="{{ route('quizzes.create') }}" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded">Créer Quiz</a>
        </div>

        @if(session('success'))
        <div class="bg-green-600 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white/10 rounded p-4 shadow-xl">

            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-500">
                        <th class="p-2">ID</th>
                        <th class="p-2">Titre</th>
                        <th class="p-2">Durée</th>
                        <th class="p-2">Prof</th>
                        <th class="p-2">Module</th>
                        <th class="p-2">Actif</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($listOfQuizzes as $quiz)
                    <tr class="border-b border-gray-700">
                        <td class="p-2">{{ $quiz->id }}</td>
                        <td class="p-2">{{ $quiz->titre }}</td>
                        <td class="p-2">{{ $quiz->duree }} min</td>
                        <td class="p-2">{{ $quiz->prof->nom ?? '—' }}</td>
                        <td class="p-2">{{ $quiz->module->nom ?? '—' }}</td>
                        <td class="p-2">{{ $quiz->is_active ? 'Oui' : 'Non' }}</td>

                        <td class="p-2 flex gap-2">
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="px-3 py-1 bg-green-600 rounded">Modifier</a>

                            <form method="POST" action="{{ route('quizzes.destroy', $quiz->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-3">Aucun quiz</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- FIXED PAGINATION -->
            <div class="mt-3">
                {{ $listOfQuizzes->links() }}
            </div>

        </div>
    </div>

</body>

</html>