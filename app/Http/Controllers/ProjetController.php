<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use App\Image;

class ProjetController extends Controller
{
    public function store()
    {
        $projet = new Projet();
        $projet->nom_projet = request()->nom_projet;
        $projet->description = request()->description;
        $projet->save();

        return redirect("/");
    }

    public function index($idProjet)
    {
        return view("/projet/modifier", [
            'projet' => Projet::findOrFail($idProjet),
            'images' => Image::select('image_link', 'image_duree')
                ->where('projets_id', '=', $idProjet)
                ->get()
        ]);
    }
}
