@extends('layout')

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/test_pointer.js')}}"></script>
@endpush


@section('body')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src={{ URL::to('/uploads/'. $image->image_link ) }} class="img-fluid" alt="image" ismap>
        </div>
        <div class="col-sm">

            <form method="POST" action="/image/modifier" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type='hidden' name='image_id' value={{$image->id}} />
                </div>

                <div class="form-group pt-4">
                    <label for="duree_image">
                        <h2>Durée d'apparition :
                            <output name="dureeOutput" id="dureeOutputId">{{$image->image_duree}}</output>
                            s</h2>
                    </label>
                    <input class="custom-range" type="range" id="duree_image" name="duree_image" value={{$image->image_duree}} min="0.5" max="10" step="0.5" oninput="dureeOutput.value = duree_image.value">
                </div>

                <h2>Zoom / Dezoom</h2>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zoomdezoom" id="zoom_radio_button" value="zoom" checked>
                        <label class="form-check-label" for="zoom_radio_button">
                            Zoom
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zoomdezoom" id="dezoom_radio_button" value="dezoom">
                        <label class="form-check-label" for="zoom_radio_button">
                            Dezoom
                        </label>
                    </div>
                </div>


                <h2>Position de fin</h2>
                <div class="form-group">
                    <label for="posX">Position X sur l'image</label>
                    <input class="form-control" type="text" id="posX" name="posX" value='{{$image->positionX_fin_zoom}}' disabled>

                    <label for="posY">Position Y sur l'image</label>
                    <input class="form-control" type="text" id="posY" name="posY" value='{{$image->positionY_fin_zoom}}' disabled>
                    <small id="posYHelp" class="form-text text-muted">Cliquez sur l'image pour modifier les coordonées</small>
                </div>
                <div class="form-group">
                    <input type="hidden" type="text" id="posX" name="posX" value='{{$image->positionX_fin_zoom}}'>
                    <input type="hidden" type="text" id="posY" name="posY" value='{{$image->positionY_fin_zoom}}'>
                </div>


                <div class="form-group">
                    <label for="duree_image">
                        <h2>Niveau du zoom :
                            <output name="niveauZoom_output" id="dureeOutputId">{{$image->niveau_zoom}}</output>
                            x</h2>
                    </label>
                    <input class="custom-range" type="range" id="niveau_zoom" name="niveau_zoom" value={{$image->niveau_zoom}} min="1" max="10" step="0.5" oninput="niveauZoom_output.value = niveau_zoom.value">
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>

        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("img").on("click", function(event) {
            bounds = this.getBoundingClientRect();
            var left = bounds.left;
            var top = bounds.top;
            var x = event.pageX - left;
            var y = event.pageY - top;
            var cw = this.clientWidth;
            var ch = this.clientHeight;
            var iw = this.naturalWidth;
            var ih = this.naturalHeight;
            var px = x / cw * iw;
            var py = y / ch * ih;

            console.log('x: ' + px / iw);
            console.log('y: ' + py / ih);
            $('input[name=posX]').val(px / iw);
            $('input[name=posY]').val(py / ih);
        });
    });

</script>
