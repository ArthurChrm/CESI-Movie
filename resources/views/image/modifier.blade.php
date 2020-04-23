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
                    <label for="duree_image">Durée d'apparition (en secondes):
                        <output name="dureeOutput" id="dureeOutputId">{{$image->image_duree}}</output>
                    </label>
                    <input class="custom-range" type="range" id="duree_image" name="duree_image" value={{$image->image_duree}} min="0.5" max="10" step="0.5" oninput="dureeOutputId.value = duree_image.value">
                </div>

                <div class="form-group pt-4">
                    <label for="posX">Coordonnée X de l'image</label>

                    <input class="custom-range" type="text" id="posX" name="posX" disabled>
                    <small id="posXHelp" class="form-text text-muted">Cliquez sur l'image</small>

                    <label for="posY">Coordonnée Y de l'image</label>
                    <input class="custom-range" type="text" id="posY" name="posY" disabled>
                    <small id="posYHelp" class="form-text text-muted">Cliquez sur l'image</small>

                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
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
            var cw = this.clientWidth
            var ch = this.clientHeight
            var iw = this.naturalWidth
            var ih = this.naturalHeight
            var px = x / cw * iw
            var py = y / ch * ih
            $('input[name=posX]').val(Math.floor(px));
            $('input[name=posY]').val(Math.floor(py));
        });
    });

</script>
