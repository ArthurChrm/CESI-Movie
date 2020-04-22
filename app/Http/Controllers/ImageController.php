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
        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);

        $fileName = time() . '.' . Request()->image->extension();
        Request()->image->move(public_path('uploads'), $fileName);

        $image = new Image();
        $image->image_link = $fileName;
        $image->image_duree = request()->duree_image;
        $image->projets_id = request()->id_projet;
        $image->save();

        return redirect("/projet/modifier/".request()->id_projet);
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
}
