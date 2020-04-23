@extends('layout')

@section('body')
<h1>{{$projet->nom_projet}}</h1>

<div id="fenetre_d_affichage" class="text-center" style="max-height: 37em">
    <img class="img-fluid" src={{ URL::to('/images/placeholder2.png') }} alt="Card image cap" style="height: 37em">
</div>

<div id='boutons_controles' class="text-center">
    <div class="container" style="display: flex; justify-content: center;">
        <div class="row">
            <div class="">
                <a href="#" class="btn btn-light btn-lg" role="button" aria-pressed="true"><svg class="bi bi-skip-backward-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 3.5A.5.5 0 000 4v8a.5.5 0 001 0V4a.5.5 0 00-.5-.5z" clip-rule="evenodd" />
                        <path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 000 1.393z" />
                        <path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 000 1.393z" />
                    </svg></a>
            </div>
            <div class="">
                <a href="#" class="btn btn-light btn-lg" role="button" aria-pressed="true"><svg class="bi bi-pause-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 3.5A1.5 1.5 0 017 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5zm5 0A1.5 1.5 0 0112 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5z" />
                    </svg></a>
            </div>
            <div class="">
                <a href="#" class="btn btn-light btn-lg" role="button" aria-pressed="true"><svg class="bi bi-play-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 010 1.393z" />
                    </svg></a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div style="display: flex; overflow: overlay;">
        @foreach($images as $image)
        <div class="pl-2">
            <div class="card" style="width: 10rem;">
            <div style="height: 8em; overflow: hidden">
                <img class="card-img-top img-thumbnail" style="object-fit: cover" src={{ URL::to('/uploads/'. $image->image_link ) }} alt="Card image cap">
            </div>
                <div class="card-body">
                    <h5 class="card-title">Durée : 2s</h5>
                    <p class="card-text">Zoom : </p>

                    <form method="GET" action="/image/modifier" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type='hidden' name='image' value={{$image->id}} />
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                    </form>

                    {{-- <a href="/image/modifier" class="btn btn-outline-secondary">Modifier</a> --}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="col">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src={{ URL::to('/images/ajout_element.png') }} alt="Card image cap">
                <div class="card-body">
                    <form method="GET" action="/image/create" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type='hidden' name='projet' value={{$projet->id}} />
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Ajouter une image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
