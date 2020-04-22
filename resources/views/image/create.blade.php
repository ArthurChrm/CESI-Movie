@extends('layout')

@section('body')
<div style="display: flex; justify-content: space-around; margin-top: 5%">
<div class="p-5 border border-primary rounded bg-light" style="width: 25%">
<form method="POST" action="/image/create" enctype="multipart/form-data">
    @csrf
    <div class="custom-file">
        <input class="custom-file-input" id="image" name="image" type='file'>
        <label class="custom-file-label" for="image">Image</label>
    </div>
    <div class="form-group pt-4">
        <label for="duree_image">Durée d'apparition (en secondes):
            <output name="dureeOutput" id="dureeOutputId">5</output>
        </label>
        <input class="custom-range" type="range" id="duree_image" name="duree_image" min="0" max="10" step="0.5" oninput="dureeOutputId.value = duree_image.value">

        <small id="emailHelp" class="form-text text-muted">Cette valeur pourra être modifiée plus tard.</small>
    </div>
    <div class="form-group">
        <input type='hidden' name='id_projet' value={{$id_projet}} />
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
</div>
@endsection
