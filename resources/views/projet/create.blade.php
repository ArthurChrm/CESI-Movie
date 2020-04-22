@extends('layout')

@section('body')
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Nom du projet</label>
        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le nom du projet">
        <small id="emailHelp" class="form-text text-muted">Le nom vous servira à identifier votre projet.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description du projet</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Entrez la description du projet"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection
