<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\respiscine;
use Illuminate\Http\Request;

class respiscineController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respiscines = DB::table('respiscines')
            ->join('clients', 'respiscines.numPieceID', '=', 'clients.numPieceID')
            ->select('respiscines.*', 'clients.*')
            ->get();
    return view('back.respiscine.index', compact('respiscines'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view ('back.respiscine.create');
}

    public function create2()
    {
        $piscines = DB::table('piscines')
            ->where('etat','=','0')
            ->get();
        $numPieceIDs = DB::table('clients')
            ->where('etat','=','0')
            ->get();
        return view ('back.respiscine.create2',compact('numPieceIDs','piscines'));
    }

    public function redirection()
    {
        return view ('back.respiscine.redRes');
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
        'numPieceID'=>'required|max:100'

    ]);
    $save=new respiscine;
    $save->numPieceID=$request->numPieceID;
    $save->nbre_personne=$request->nbre_personne;
    $save->idpiscine=$request->idpiscine;
    $save->date=$request->date;

    $save->save();
    return back()->with('message', "La reservation a bien ete fait !");
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\respiscine  $respiscine
 * @return \Illuminate\Http\Response
 */
public function show($idrespiscine)
{
    $respiscine=DB::table('respiscines')
    ->select('*')
    ->whereRaw('idrespiscine = ?',[$idrespiscine])
    ->get();
    return view('back.respiscine.show', compact('respiscine'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\respiscine  $respiscine
 * @return \Illuminate\Http\Response
 */
public function edit($idrespiscine)
{
    $respiscine=DB::table('respiscines')
        ->select('*')
        ->whereRaw('idrespiscine = ?',[$idrespiscine])
        ->get();
    return view('back.respiscine.edit', compact('respiscine'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\respiscine  $respiscine
 * @return \Illuminate\Http\Response
 */
public function update(Request $request,  $idrespiscine)
{
    $validatedData=$request->validate([
        'nomclient'=>'required|max:100',
        'numPieceID'=>'required|max:100',

    ]);
     $save=respiscine::find($idrespiscine);
    $save->nomclient=$request->nomclient;
    $save->numPieceID=$request->numPieceID;
    $save->nbre_personne=$request->nbre_personne;
    $save->date=$request->date;

      $save->save();
    return back()->with('message', "Le respiscine a bien ete modifie avec success !");
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\respiscine  $respiscine
 * @return \Illuminate\Http\Response
 */
public function destroy($idrespiscine)
{
 $respiscine=respiscine::findOrFail($idrespiscine);
 $message='';
 $erreur='';
 if ($respiscine->etat==0)
        {
        $message="respiscine Supprime avec success";
        $respiscine->delete();
         }
        else{ $erreur="Suppression du respiscine non autorise";}
        if ($message!='')
        { return back()->with('message', $message);}
       else
       { return back()->with('erreur', $erreur);
        }
}
public function state($idrespiscine)
{

    $respiscine =DB::table('respiscines')
    ->select('*')
    ->whereRaw('idrespiscine = ?',[$idrespiscine])
    ->first();

    if($respiscine -> etat == 0){
        DB::table('respiscines')
        ->whereRaw('idrespiscine = ?',[$idrespiscine])
        ->update(['etat'=>1]);
        return redirect('back/respiscine');
    } else{
        DB::table('respiscines')
        ->whereRaw('idrespiscine = ?',[$idrespiscine])
        ->update(['etat'=>0]);
        return redirect('back/respiscine');
    }

}
}
