<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\heursortie;
use Illuminate\Http\Request;

class heursortieController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $heursortie = heursortie::all();
        return view('back.heursortie.index', compact('heursortie'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.heursortie.create');
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
            'heursortie'=>'required|max:100',
 
        ]);
        $save=new heursortie;
        $save->matEmp=$request->matEmp;
        $save->nomEmp=$request->nomEmp;
        $save->heursortie=$request->heursortie;        
        
        $save->save();
        return back()->with('message', "Le heursortie a bien ete fait !");
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\heursortie  $heursortie
     * @return \Illuminate\Http\Response
     */
    public function show($idheursortie)
    {
        $heursortie=DB::table('heursorties')
        ->select('*')
        ->whereRaw('idheursortie = ?',[$idheursortie])
        ->get();
        return view('back.heursortie.show', compact('heursortie'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\heursortie  $heursortie
     * @return \Illuminate\Http\Response
     */
    public function edit($idheursortie)
    {
        $heursortie=DB::table('heursorties')
        ->select('*')
        ->whereRaw('idheursortie = ?',[$idheursortie])
        ->get();
         return view('back.heursortie.edit', compact('heursortie'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\heursortie  $heursortie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idheursortie)
    {
        $validatedData=$request->validate([
            'matEmp'=>'required|max:100', 
            'heursortie'=>'required|max:100', 
           
        ]);
        $save=heursortie::find($idheursortie);
 
         $save->matEmp=$request->matEmp;
        $save->nomEmp=$request->nomEmp;
        $save->heursortie=$request->heursortie;
       $save->save();
        return back()->with('message', "Le heursortie a bien ete modifie avec success !");
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\heursortie  $heursortie
     * @return \Illuminate\Http\Response
     */
    public function destroy($idheursortie)
    {
        
     $heursortie=heursortie::findOrFail($idheursortie);
     $message='';
     $erreur='';
     if ($heursortie->etat==0) 
            {
            $message="heursortie Supprime avec success";
            $heursortie->delete();
             } 
            else{ $erreur="Suppression du heursortie non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    } 
 
     public function state($idheursortie)
    {$heursortie =DB::table('heursorties')
        ->select('*')
        ->whereRaw('idheursortie = ?',[$idheursortie])
        ->first();
 
        if($heursortie -> etat == 0){
            DB::table('heursorties')
            ->whereRaw('idheursortie = ?',[$idheursortie])
            ->update(['etat'=>1]);
            return redirect('back/heursortie');
        } else{
            DB::table('heursorties')
            ->whereRaw('idheursortie = ?',[$idheursortie])
            ->update(['etat'=>0]);
            return redirect('back/heursortie');
        }
        
        
    }
 

}