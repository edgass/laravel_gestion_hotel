<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\heurentre;
use Illuminate\Http\Request;

class heurentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heurentre = heurentre::all();
        return view('back.heurentre.index', compact('heurentre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.heurentre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData=$request->validate([
            'matEmp'=>'required|max:100', 
            'heurentre'=>'required|max:100',

        ]);
        $save=new heurentre;
        $save->matEmp=$request->matEmp;
        $save->nomEmp=$request->nomEmp;
        $save->heurentre=$request->heurentre;        
        
        $save->save();
        return back()->with('message', "Le heurentre a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\heurentre  $heurentre
     * @return \Illuminate\Http\Response
     */
    public function show($idheurentre)
    {
        $heurentre=DB::table('heurentres')
        ->select('*')
        ->whereRaw('idheurentre = ?',[$idheurentre])
        ->get();
        return view('back.heurentre.show', compact('heurentre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\heurentre  $heurentre
     * @return \Illuminate\Http\Response
     */
    public function edit($idheurentre)
    {
        $heurentre=DB::table('heurentres')
        ->select('*')
        ->whereRaw('idheurentre = ?',[$idheurentre])
        ->get();
         return view('back.heurentre.edit', compact('heurentre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\heurentre  $heurentre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idheurentre)
    {
        $validatedData=$request->validate([
            'matEmp'=>'required|max:100', 
            'heurentre'=>'required|max:100', 
           
        ]);
        $save=heurentre::find($idheurentre);

         $save->matEmp=$request->matEmp;
        $save->nomEmp=$request->nomEmp;
        $save->heurentre=$request->heurentre;
       $save->save();
        return back()->with('message', "Le heurentre a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\heurentre  $heurentre
     * @return \Illuminate\Http\Response
     */
    public function destroy($idheurentre)
    {
        
     $heurentre=heurentre::findOrFail($idheurentre);
     $message='';
     $erreur='';
     if ($heurentre->etat==0) 
            {
            $message="heurentre Supprime avec success";
            $heurentre->delete();
             } 
            else{ $erreur="Suppression du heurentre non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    } 

     public function state($idheurentre)
    {$heurentre =DB::table('heurentres')
        ->select('*')
        ->whereRaw('idheurentre = ?',[$idheurentre])
        ->first();

        if($heurentre -> etat == 0){
            DB::table('heurentres')
            ->whereRaw('idheurentre = ?',[$idheurentre])
            ->update(['etat'=>1]);
            return redirect('back/heurentre');
        } else{
            DB::table('heurentres')
            ->whereRaw('idheurentre = ?',[$idheurentre])
            ->update(['etat'=>0]);
            return redirect('back/heurentre');
        }
        
        
    }

}