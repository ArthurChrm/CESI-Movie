@extends('layout')

@section('body')


<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src={{ URL::to('/uploads/'. $image->image_link ) }} class="img-fluid" alt="image">

        </div>
        <div class="col-sm">

            <form method="POST" action="/image/modifier" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type='hidden' name='image_id' value={{$image->id}} />
                </div>

                <div class="form-group pt-4">
                    <label for="duree_image">Durée d'apparition (en secondes):
                        <output name="dureeOutput" id="dureeOutputId">{{$image->image_duree}}</output>
                    </label>
                    <input class="custom-range" type="range" id="duree_image" name="duree_image" value={{$image->image_duree}} min="0.5" max="10" step="0.5" oninput="dureeOutputId.value = duree_image.value">
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

        </div>
    </div>
</div>

@endsection
