<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\heurpose;
use Illuminate\Http\Request;

class heurposeController extends Controller
{  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $heurpose = heurpose::all();
       return view('back.heurpose.index', compact('heurpose'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view ('back.heurpose.create');
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
           'heurpose'=>'required|max:100',

       ]);
       $save=new heurpose;
       $save->matEmp=$request->matEmp;
       $save->nomEmp=$request->nomEmp;
       $save->heurpose=$request->heurpose;        
       
       $save->save();
       return back()->with('message', "Le heurpose a bien ete fait !");
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\heurpose  $heurpose
    * @return \Illuminate\Http\Response
    */
   public function show($idheurpose)
   {
       $heurpose=DB::table('heurposes')
       ->select('*')
       ->whereRaw('idheurpose = ?',[$idheurpose])
       ->get();
       return view('back.heurpose.show', compact('heurpose'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\heurpose  $heurpose
    * @return \Illuminate\Http\Response
    */
   public function edit($idheurpose)
   {
       $heurpose=DB::table('heurposes')
       ->select('*')
       ->whereRaw('idheurpose = ?',[$idheurpose])
       ->get();
        return view('back.heurpose.edit', compact('heurpose'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\heurpose  $heurpose
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $idheurpose)
   {
       $validatedData=$request->validate([
           'matEmp'=>'required|max:100', 
           'heurpose'=>'required|max:100', 
          
       ]);
       $save=heurpose::find($idheurpose);

        $save->matEmp=$request->matEmp;
       $save->nomEmp=$request->nomEmp;
       $save->heurpose=$request->heurpose;
      $save->save();
       return back()->with('message', "Le heurpose a bien ete modifie avec success !");
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\heurpose  $heurpose
    * @return \Illuminate\Http\Response
    */
   public function destroy($idheurpose)
   {
       
    $heurpose=heurpose::findOrFail($idheurpose);
    $message='';
    $erreur='';
    if ($heurpose->etat==0) 
           {
           $message="heurpose Supprime avec success";
           $heurpose->delete();
            } 
           else{ $erreur="Suppression du heurpose non autorise";}
           if ($message!='') 
           { return back()->with('message', $message);}
          else
          { return back()->with('erreur', $erreur);
   }
   } 

    public function state($idheurpose)
   {
    $heurpose =DB::table('heurposes')
       ->select('*')
       ->whereRaw('idheurpose = ?',[$idheurpose])
       ->first();

       if($heurpose -> etat == 0){
           DB::table('heurposes')
           ->whereRaw('idheurpose = ?',[$idheurpose])
           ->update(['etat'=>1]);
           return redirect('back/heurpose');
       } else{
           DB::table('heurposes')
           ->whereRaw('idheurpose = ?',[$idheurpose])
           ->update(['etat'=>0]);
           return redirect('back/heurpose');
       }
       
       
   }


}