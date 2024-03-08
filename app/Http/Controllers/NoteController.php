<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Note;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        $module = Module::find($id);
        $stagiaires = $module ? $module->stagiaires : [];
        return view('note.index',['stagiaires' => $stagiaires ,'modules'=>Module::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create',['stagiaires' => Stagiaire::all() ,'modules'=>Module::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $module = Module::find($request['module_id']);
    foreach ($request['stagiaire_id'] as $index => $stagiaire){
        $note = $request['note'][$index];
        $module->stagiaires()->attach($stagiaire, ['note' => $note]);
    }
    // for ($i=0; $i < count($request['stagiaire_id']); $i++) { 
    //     $note = $request['note'][$i];
    //     $module->stagiaires()->attach($request['stagiaire_id'][$i], ['note' => $note]);
    // }
   return redirect('/notes/'.$request['module_id']);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module,Stagiaire $stagiaire)
    {  
        $note = $module->stagiaires->where('id', $stagiaire->id);
        // dd($note[0]->pivot);
        return view('note.edit',['modules' => Module::all(),'stagiaire'=>$stagiaire,'note' => $note[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module, Stagiaire $stagiaire )
    {
       $module->stagiaires()->updateExistingPivot($stagiaire,['note' => $request['note']]);
       return redirect('/notes/'.$module->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module,Stagiaire $stagiaire)
    {
        $module->stagiaires()->detach($stagiaire->id);
       return redirect('/notes/'.$module->id);
    }
}
