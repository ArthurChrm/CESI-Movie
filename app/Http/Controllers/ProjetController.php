<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use App\Image;

class ProjetController extends Controller
{
    public function store()
    {
        if(request()->nom_projet == null || request()->description == null){
            return redirect('/projet/create');
        }
        
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
            'images' => Image::select('id', 'image_link', 'image_duree', 'niveau_zoom')
                ->where('projets_id', '=', $idProjet)
                ->get()
        ]);
    }
}
