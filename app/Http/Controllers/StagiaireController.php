<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaire.index',['stagiaires' => $stagiaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stagiaire = new Stagiaire;
        $stagiaire->nom = $request['nom'];
        $stagiaire->prenom = $request['prenom'];
        $stagiaire->save();
       return redirect('/stagiaires');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaire.edit',['stagiaire' => $stagiaire]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    
    {

        $stagiaire->nom = $request['nom'];
        $stagiaire->prenom = $request['prenom'];
        $stagiaire->save();
        return redirect('/stagiaires');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->modules()->detach();
        $stagiaire->delete();
        return redirect('/stagiaires');
    }
}
