<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;

class ProjetController extends Controller
{
    public function store(){
        $projet = new Projet();
        $projet->nom_projet = request()->nom_projet;
        $projet->description = request()->description;
        $projet->save();
    
        return redirect("/");
    }
}
