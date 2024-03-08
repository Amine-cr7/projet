<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Stagiaire::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Stagiaire::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return Stagiaire::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stagiaire = Stagiaire::find($id);
        $stagiaire->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        $stagiaire->delete();
    }
}
