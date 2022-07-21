<?php

namespace App\Http\Controllers;
use App\Models\client;
use Illuminate\Support\Facades\DB;
use App\Models\reschambre;
use Illuminate\Http\Request;

class reschambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $reschambre = DB::table('reschambres')
                        ->join('clients', 'reschambres.numPieceID', '=', 'clients.numPieceID')
                        ->select('reschambres.*', 'clients.*')
                        ->get();
        return view('back.reschambre.index', compact('reschambre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chambres = DB::table('chambres')
                    ->where('etat','=','0')
                    ->get();
        return view ('back.reschambre.create',compact('chambres'));
    }

    public function create2()
    {
        $chambres = DB::table('chambres')
                    ->where('etat','=','0')
                    ->get();
        $numPieceIDs = DB::table('clients')
                        ->where('etat','=','0')
                        ->get();
        return view ('back.reschambre.create2',compact('numPieceIDs','chambres'));
    }

    public function redirection()
    {
        return view ('back.reschambre.redRes');
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
            'numPieceID'=>'required|max:100',

        ]);
        $save=new reschambre;
        $save->numPieceID=$request->numPieceID;
        $save->numeroChambre=$request->numeroChambre;
        $save->nbre_personne=$request->nbre_personne;
        $save->date=$request->date;

        $save->save();

        $reschambre = reschambre::all();
        return view('back.reschambre.index',compact('reschambre'));
    }

    public function store2(Request $request,$id)
    {
        $validatedData=$request->validate([
            'numPieceID'=>'required|max:100',

        ]);
        $save=new reschambre;
        $save->numPieceID= $id;
        $save->numeroChambre=$request->numeroChambre;
        $save->nbre_personne=$request->nbre_personne;
        $save->date=$request->date;

        $save->save();

        $reschambre = reschambre::all();
        return view('back.reschambre.index',compact('reschambre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reschambre  $reschambre
     * @return \Illuminate\Http\Response
     */
    public function show($idreschambre)
    {
        $reschambre=DB::table('reschambres')
        ->select('*')
        ->whereRaw('idreschambre = ?',[$idreschambre])
        ->get();
        return view('back.reschambre.show', compact('reschambre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reschambre  $reschambre
     * @return \Illuminate\Http\Response
     */
    public function edit($idreschambre)
    {
        $reschambre=DB::table('reschambres')
        ->select('*')
        ->whereRaw('idreschambre = ?',[$idreschambre])
        ->get();
        return view('back.reschambre.edit', compact('reschambre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reschambre  $reschambre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idreschambre)
    {
        $validatedData=$request->validate([
            'nomclient'=>'required|max:100',
            'prenomclient'=>'required|max:100',
            'numPieceID'=>'required|max:100',

        ]);
         $save=reschambre::find($idreschambre);
        $save->nomclient=$request->nomclient;
        $save->prenomclient=$request->prenomclient;
        $save->numPieceID=$request->numPieceID;
        $save->nbre_personne=$request->nbre_personne;
        $save->date=$request->date;

          $save->save();
        return back()->with('message', "Le reschambre a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reschambre  $reschambre
     * @return \Illuminate\Http\Response
     */
    public function destroy($idreschambre)
    {
     $reschambre=reschambre::findOrFail($idreschambre);
     $message='';
     $erreur='';
     if ($reschambre->etat==1)
            {
            $message="reschambre Supprime avec success";
            $reschambre->delete();
             }
            else{ $erreur="Suppression du reschambre non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
            }
    }
    public function state($idreschambre)
    {

        $reschambre =DB::table('reschambres')
        ->select('*')
        ->whereRaw('idreschambre = ?',[$idreschambre])
        ->first();

        if($reschambre -> etat == 0){
            DB::table('reschambres')
            ->whereRaw('idreschambre = ?',[$idreschambre])
            ->update(['etat'=>1]);
            return redirect('back/reschambre');
        } else{
            DB::table('reschambres')
            ->whereRaw('idreschambre = ?',[$idreschambre])
            ->update(['etat'=>0]);
            return redirect('back/reschambre');
        }



    }
}
