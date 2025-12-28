<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modifier Prof</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a);
            color: white;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4" style="width:400px;">
        <h2 class="text-center mb-3">Modifier Professeur</h2>

        <form method="POST" action="{{ route('profs.update', $SelectedProf->id) }}">
            @csrf
            @method('PUT')
            <input class="form-control mb-3" type="text" name="nom" value="{{ $SelectedProf->nom }}" placeholder="Nom">
            <input class="form-control mb-3" type="email" name="email" value="{{ $SelectedProf->email }}" placeholder="Email">
            <input class="form-control mb-3" type="text" name="telephone" value="{{ $SelectedProf->telephone }}" placeholder="Téléphone">
            <button class="btn btn-success w-100">Mettre à jour</button>
            <a href="{{ route('profs.showAll') }}" class="btn btn-outline-light w-100 mt-2">Annuler</a>
        </form>
    </div>

</body>

</html>