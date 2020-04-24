@extends('layout')

@section('body')
<div class="container">
    <h1>{{$projet->nom_projet}}</h1>
</div>
<div style="display: flex; justify-content: center;">
    <div id="fenetre_d_affichage" class="text-center" style="height: 33em; max-height: 33em; background-repeat: no-repeat; width: 33em;" >
        
    </div>
</div>

<div id='boutons_controles' class="text-center">
    <div class="container" style="display: flex; justify-content: center;">
        <div class="row">
            <div class="" id="buttonReturn">
                <a href="#" class="btn btn-light btn-lg" role="button" aria-pressed="true"><svg class="bi bi-skip-backward-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 3.5A.5.5 0 000 4v8a.5.5 0 001 0V4a.5.5 0 00-.5-.5z" clip-rule="evenodd" />
                        <path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 000 1.393z" />
                        <path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 000 1.393z" />
                    </svg></a>
            </div>
            <div class="" id="buttonPause">
                <a href="#" class="btn btn-light btn-lg" role="button" aria-pressed="true"><svg class="bi bi-pause-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 3.5A1.5 1.5 0 017 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5zm5 0A1.5 1.5 0 0112 5v6a1.5 1.5 0 01-3 0V5a1.5 1.5 0 011.5-1.5z" />
                    </svg></a>
            </div>
            <div class="" id="buttonPlay">
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
                    <p class="card-title">Durée : {{$image->image_duree}}s</p>
                    <p class="card-text">Zoom : {{$image->niveau_zoom}}x</p>

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
<script>
    var images = {!! $images_js !!};
    var i = 0;
    var start = false;
    var restart = false;
    var pause = false;
    var image = images[i];

    initBackground = function(div){
        image = images[i];
        div = document.getElementById(div);
        div.style.backgroundImage = "url(/uploads/"+image.image_link+")";
        div.style.backgroundPosition = "50% 50%";
        div.style.backgroundSize = "100%";
    }

    initBackground("fenetre_d_affichage");

  nextImage = function(div){
    if(images.length > 0 && image.id != images[images.length-1].id){
      i++;
      image = images[i];
      div.style.backgroundSize = "100%";
      div.style.backgroundImage = "url(/uploads/"+image.image_link+")";
      kenBurnsEffect(div, image)
    }
    else{
      i = 0;
    }
  }


  function kenBurnsEffect(div, options) {
    start = true;
    var current = {
        zoom: 1,
        xCenter: 0.5,
        yCenter: 0.5
      },
      pas, frames;
      if (!(div instanceof HTMLElement)) {
		div = document.getElementById(div);
	}
	
	frames = Math.round(options.image_duree*1000 * 0.06);
	pas = {
		zoom: Math.pow((options.niveau_zoom / current.zoom), 1 / frames),
		xCenter: (options.positionX_fin_zoom - current.xCenter) / frames,
		yCenter: (options.positionY_fin_zoom - current.yCenter) / frames
    };
	function go() {
    document.getElementById("buttonPause").onclick = function(){
    pause = !pause;
    return false;
    };
    if(!pause){
        current.zoom *= pas.zoom;
        current.xCenter += pas.xCenter;
        current.yCenter += pas.yCenter;
        div.style.backgroundSize = (100 * current.zoom) + "%";
        div.style.backgroundPosition =
        (100 * current.xCenter) + "% " +
        (100 * current.yCenter) + "%";
    }
    if(!restart){
      if(!pause){
        if (--frames) {
          var timeout = setTimeout(go, 30);
        } else {
          nextImage(div);
          pause = false;
        }
      }
      else{
        var timeout = setTimeout(go, 30);
      }
    }
    else{
      clearTimeout(timeout);
      div.style.backgroundSize = "100%";
      restart=false;
      pause=false;
      start = false;

    }
	}
	go();
}

function resetImage(div){
  restart = true;
  pause=false;
  start = false;
  i= 0;
  initBackground(div);
}

document.getElementById("buttonPlay").onclick = function() {
	var f = this.form,
	options = image;
  if(!start){
	  kenBurnsEffect("fenetre_d_affichage", options);
  }
	return false;
}
document.getElementById("buttonReturn").onclick = function() {
  resetImage("fenetre_d_affichage");
  return false;
}

</script>

@endsection

