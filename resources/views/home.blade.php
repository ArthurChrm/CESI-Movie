@extends('layout')

@section('body')
<h1>Bonjour !</h1>


<div class="container">
    <div class="row">
        @for($i = 0; $i <= 10; $i++) <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src={{ URL::to('/images/placeholder.png') }} alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Projet test</h5>
                    <p class="card-text">Descrition du projet.</p>
                    <a href="/modifier" class="btn btn-primary">Go !</a>
                </div>
            </div>
    </div>
    @endfor
</div>
</div>

@endsection
