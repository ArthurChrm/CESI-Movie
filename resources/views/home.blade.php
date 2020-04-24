@extends('layout')

@section('body')



<div class="container">
    <h1>Projets</h1>
    <div class="row" style="display: flex; justify-content: space-evenly;">
        @foreach($projets as $projet)
        <div>
            <div class="card" style="width: 18rem;">
                @if(count(App\Image::where('projets_id', '=', $projet->id)->get())>0)
                <img class="card-img-top" src={{ URL::to('/uploads/'. App\Image::where('projets_id', '=', $projet->id)->get()[0]->image_link ) }} alt="Card image cap">
                @else
                <img class="card-img-top" src={{ URL::to('/images/placeholder.png') }} alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$projet->nom_projet}}</h5>
                    <p class="card-text">{{$projet->description}}</p>
                    <a href="/projet/modifier/{{$projet->id}}" class="btn btn-primary">Ouvrir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
