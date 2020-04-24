<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Projet;
use Validator;
use File;

class ImageController extends Controller
{
    public function store()
    {
        request()->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
        ]);

        $fileName = time() . '.' . Request()->image->extension();
        Request()->image->move(public_path('uploads'), $fileName);

        $image = new Image();
        $image->image_link = $fileName;
        $image->image_duree = request()->duree_image;
        $image->projets_id = request()->id_projet;
        $image->positionX_fin_zoom = 0.5;
        $image->positionY_fin_zoom = 0.5;
        $image->niveau_zoom = 2;
        $image->save();

        return redirect("/projet/modifier/" . request()->id_projet);
    }

    public function create()
    {
        return view(
            "/image/create",
            [
                'id_projet' => request()->projet
            ]
        );
    }

    public function update()
    {
        $image_id = request()->image;

        return view("image/modifier", [
            'image' => Image::findOrFail($image_id)
        ]);
    }

    public function update_post()
    {
        $image = Image::findOrFail(request()->image_id);
        $image->image_duree = request()->duree_image;

        if (request()->zoomdezoom == 'zoom') {
            $image->zoom = true;
        } else {
            $image->zoom = false;
        }

        if (request()->posX >= 1) {
            $image->positionX_fin_zoom = 0.99;
        } else if (request()->posX <= 0) {
            $image->positionX_fin_zoom = 0.1;
        } else {
            $image->positionX_fin_zoom = request()->posX;
        }

        if (request()->posY >= 1) {
            $image->positionY_fin_zoom = 0.99;
        } else if (request()->posY <= 0) {
            $image->positionY_fin_zoom = 0.1;
        } else {
            $image->positionY_fin_zoom = request()->posY;
        }

        $image->niveau_zoom = request()->niveau_zoom;
        $image->save();

        return redirect("/projet/modifier/".$image->projets_id);
    }
}
