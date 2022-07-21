<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\resrestaurant;
use Illuminate\Http\Request;

class resrestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resrestaurants = DB::table('resrestaurants')
            ->join('clients', 'resrestaurants.numPieceID', '=', 'clients.numPieceID')
            ->select('resrestaurants.*', 'clients.*')
            ->get();
        return view('back.resrestaurant.index', compact('resrestaurants'));
    }

    public function create2()
    {
        $tables = DB::table('table_restaurants')
            ->where('etat','=','0')
            ->get();
        $numPieceIDs = DB::table('clients')
            ->where('etat','=','0')
            ->get();
        return view ('back.resrestaurant.create2',compact('numPieceIDs','tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.resrestaurant.create');
    }

    public function redirection()
    {
        return view ('back.resrestaurant.redRes');
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
        $save=new resrestaurant;
        $save->numPieceID=$request->numPieceID;
        $save->numerotable=$request->numerotable;
        $save->nbre_personne=$request->nbre_personne;
        $save->date=$request->date;

        $save->save();
        return back()->with('message', "La reservation a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resrestaurant  $resrestaurant
     * @return \Illuminate\Http\Response
     */
    public function show($idresrestaurant)
    {
        $resrestaurant=DB::table('resrestaurants')
        ->select('*')
        ->whereRaw('idresrestaurant = ?',[$idresrestaurant])
        ->get();
        return view('back.resrestaurant.show', compact('resrestaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resrestaurant  $resrestaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($idresrestaurant)
    {
        $resrestaurant=DB::table('resrestaurants')
        ->select('*')
        ->whereRaw('idresrestaurant = ?',[$idresrestaurant])
        ->get();
        return view('back.resrestaurant.edit', compact('resrestaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resrestaurant  $resrestaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idresrestaurant)
    {
        $validatedData=$request->validate([
            'nomclient'=>'required|max:100',
            'prenomclient'=>'required|max:100',
            'numPieceID'=>'required|max:100',

        ]);
         $save=resrestaurant::find($idresrestaurant);
        $save->nomclient=$request->nomclient;
        $save->prenomclient=$request->prenomclient;
        $save->numPieceID=$request->numPieceID;
        $save->nbre_personne=$request->nbre_personne;
        $save->date=$request->date;

          $save->save();
        return back()->with('message', "Le resrestaurant a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resrestaurant  $resrestaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($idresrestaurant)
    {
     $resrestaurant=resrestaurant::findOrFail($idresrestaurant);
     $message='';
     $erreur='';
     if ($resrestaurant->etat==0)
            {
            $message="resrestaurant Supprime avec success";
            $resrestaurant->delete();
             }
            else{ $erreur="Suppression du resrestaurant non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
            }
    }
    public function state($idresrestaurant)
    {
        $resrestaurant =DB::table('resrestaurants')
        ->select('*')
        ->whereRaw('idresrestaurant = ?',[$idresrestaurant])
        ->first();

        if($resrestaurant -> etat == 0){
            DB::table('resrestaurants')
            ->whereRaw('idresrestaurant = ?',[$idresrestaurant])
            ->update(['etat'=>1]);
            return redirect('back/resrestaurant');
        } else{
            DB::table('resrestaurants')
            ->whereRaw('idresrestaurant = ?',[$idresrestaurant])
            ->update(['etat'=>0]);
            return redirect('back/resrestaurant');
        }

    }

    }

