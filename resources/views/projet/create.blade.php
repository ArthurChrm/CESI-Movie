@extends('layout')

@section('body')
<form method="POST" action="/projet/create" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="nom_projet">Nom du projet</label>
        <input class="form-control" id="nom_projet" name="nom_projet" aria-describedby="emailHelp" placeholder="Entrez le nom du projet">
        <small id="emailHelp" class="form-text text-muted">Le nom vous servira à identifier votre projet.</small>
    </div>
    <div class="form-group">
        <label for="description">Description du projet</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez la description du projet"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection
