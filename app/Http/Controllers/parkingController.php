<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\parking;
use Illuminate\Http\Request;

class parkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parking = parking::all();
        return view('back.parking.index', compact('parking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.parking.create');
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
            'numeroplace'=>'required|max:100', 
            

        ]);
        $save=new parking;
        $save->numeroplace=$request->numeroplace;
        $save->prixjour=$request->prixjour;        
        
        $save->save();
        return back()->with('message', "Le parking a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show($idparking)
    {
        $parking=DB::table('parkings')
       ->select('*')
       ->whereRaw('idparking = ?',[$idparking])
       ->get();
        return view('back.parking.show', compact('parking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function edit($idparking)
    {
        $parking=DB::table('parkings')
        ->select('*')
        ->whereRaw('idparking = ?',[$idparking])
        ->get();
         return view('back.parking.edit', compact('parking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idparking)
    {
        $validatedData=$request->validate([
            'numeroplace'=>'required|max:100', 
           
        ]);
        $save=parking::find($idparking);

        $save->numeroplace=$request->numeroplace;
        $save->prixjour=$request->prixjour;
       $save->save();
        return back()->with('message', "Le parking a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy($idparking)
    {
        
    
     $parking= DB::table('parkings')
                ->select('*')
                ->whereRaw("idparking = ?",[$idparking])
                ->first();
     $message='';
     $erreur='';
     if ($parking->etat==0) 
            {
            $message="parking Supprime avec success";
            $parking->delete();
             } 
            else{ $erreur="Suppression du parking non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
            }
    } 

     public function state($idparking)
    {$parking =DB::table('parkings')
        ->select('*')
        ->whereRaw('idparking = ?',[$idparking])
        ->first();
 
        if($parking -> etat == 0){
            DB::table('parkings')
            ->whereRaw('idparking = ?',[$idparking])
            ->update(['etat'=>1]);
            return redirect('back/parking');
        } else{
            DB::table('parkings')
            ->whereRaw('idparking = ?',[$idparking])
            ->update(['etat'=>0]);
            return redirect('back/parking');
        }
        
        
    }

}
