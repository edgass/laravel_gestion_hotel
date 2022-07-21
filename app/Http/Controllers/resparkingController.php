<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\resparking;
use Illuminate\Http\Request;

class resparkingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resparkings = DB::table('resparkings')
            ->join('clients', 'resparkings.numPieceID', '=', 'clients.numPieceID')
            ->select('resparkings.*', 'clients.*')
            ->get();
    return view('back.resparking.index', compact('resparkings'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view ('back.resparking.create');
}

    public function create2()
    {
        $parkings = DB::table('parkings')
            ->where('etat','=','0')
            ->get();
        $numPieceIDs = DB::table('clients')
            ->where('etat','=','0')
            ->get();
        return view ('back.resparking.create2',compact('numPieceIDs','parkings'));
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 *
 *
 */


    public function redirection()
    {
        return view ('back.resparking.redRes');
    }

public function store(Request $request)
{
    $validatedData=$request->validate([
        'numPieceID'=>'required|max:100',

    ]);
    $save=new resparking;
    $save->numPieceID=$request->numPieceID;
    $save->numeroplace=$request->numeroplace;
    $save->numPieceID=$request->numPieceID;
    $save->date=$request->date;

    $save->save();
    return back()->with('message', "La reservation a bien ete fait !");
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\resparking  $resparking
 * @return \Illuminate\Http\Response
 */
public function show($idresparking)
{
    $idclient =DB::table('resparkings')
        ->whereRaw('idresparking = ?',[$idresparking])
        ->value('numPieceID');
    $resparking=DB::table('resparkings')
    ->select('*')
    ->whereRaw('idresparking = ?',[$idresparking])
    ->get();
    $client = DB::table('clients')
        ->whereRaw('numPieceID = ?',[$idclient])
        ->first();
    return view('back.resparking.show', compact('resparking','client'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\resparking  $resparking
 * @return \Illuminate\Http\Response
 */
public function edit($idresparking)
{
    $resparking=DB::table('resparkings')
        ->select('*')
        ->whereRaw('idresparking = ?',[$idresparking])
        ->get();
    return view('back.resparking.edit', compact('resparking'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\resparking  $resparking
 * @return \Illuminate\Http\Response
 */
public function update(Request $request,  $idresparking)
{
    $validatedData=$request->validate([
        'numPieceID'=>'required|max:100',

    ]);
     $save=resparking::find($idresparking);
    $save->nomclient=$request->nomclient;
    $save->numPieceID=$request->numPieceID;
    $save->nbre_place=$request->nbre_place;
    $save->date=$request->date;

      $save->save();
    return back()->with('message', "Le resparking a bien ete modifie avec success !");
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\resparking  $resparking
 * @return \Illuminate\Http\Response
 */
public function destroy($idresparking)
{
 $resparking= DB::table('resparkings')
                ->select('*')
                ->whereRaw("idresparking = ?",[$idresparking])
                ->first();
 $message='';
 $erreur='';
 if ($resparking->etat==0)
        {
        $message="resparking Supprime avec success";
        DB::table('resparkings')
                ->whereRaw("idresparking = ?",[$idresparking])
                ->delete();
         }
        else{ $erreur="Suppression du resparking non autorise";}
        if ($message!='')
        { return back()->with('message', $message);}
       else
       { return back()->with('erreur', $erreur);
        }
}
public function state($idresparking)
{


    $resparking =DB::table('resparkings')
    ->select('*')
    ->whereRaw('idresparking = ?',[$idresparking])
    ->first();

    if($resparking -> etat == 0){
        DB::table('resparkings')
        ->whereRaw('idresparking = ?',[$idresparking])
        ->update(['etat'=>1]);
        return redirect('back/resparking');
    } else{
        DB::table('resparkings')
        ->whereRaw('idresparking = ?',[$idresparking])
        ->update(['etat'=>0]);
        return redirect('back/resparking');
    }

}
}
