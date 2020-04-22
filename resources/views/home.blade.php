@extends('layout')

@section('body')
<h1>Mes projets</h1>


<div class="container" >
    <div class="row" style="display: flex; justify-content: space-evenly;">
        @foreach($projets as $projet) 
        <div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src={{ URL::to('/images/placeholder.png') }} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$projet->nom_projet}}</h5>
                    <p class="card-text">{{$projet->description}}</p>
                    <a href="/projet/modifier" class="btn btn-primary">Go !</a>
                </div>
            </div>
    </div>
    @endforeach
</div>
</div>

@endsection
