@extends('layout')

@section('body')
<div style="display: flex; justify-content: space-around; margin-top: 5%">
<div class="p-5 border border-primary rounded bg-light" >
<form method="POST" action="/projet/create" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="nom_projet"><h1>Nom du projet</h1></label>
        <input class="form-control" id="nom_projet" name="nom_projet" aria-describedby="emailHelp" placeholder="Entrez le nom du projet">
        <small id="emailHelp" class="form-text text-muted">Le nom vous servira à identifier votre projet.</small>
    </div>
    <div class="form-group">
        <label for="description"><h2>Description du projet</h2></label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez la description du projet"></textarea>
    </div>
    <div style="display: flex; justify-content: center">
        <button type="submit" class="btn btn-primary border-dark" style="width: 50%">Créer</button>
    </div>
</form>
</div>
</div>
@endsection
