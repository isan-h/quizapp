<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a);
            color: white;
            min-height: 100vh;
        }

        .table thead th {
            color: #f4f4ff;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border: none;
            margin-top: 30px;
        }

        a.btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2>Liste des étudiants</h2>
            <a class="btn btn-primary" href="{{ route('etudiants.create') }}">Créer Étudiant</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <div class="card p-3">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Groupe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ListEtudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->num_groupe }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('etudiants.show', $etudiant->id) }}">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun étudiant pour le moment.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $ListEtudiants->links() }}
        </div>
    </div>
</body>

</html>