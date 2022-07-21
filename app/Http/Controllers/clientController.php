<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;


class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = client::all();
        return view('back.client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.client.create');
    }
    public function createC()
    {
        return view ('back.client.createC');
    }
    public function createPi()
    {
        return view ('back.client.createPi');
    }
    public function createPk()
    {
        return view ('back.client.createPk');
    }
    public function createR()
    {
        return view ('back.client.createR');
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
            'nomClient'=>'required|max:100',
            'prenomClient'=>'required|max:100',
            'numPieceID'=>'required|max:100',
            'emailClient'=>'required|max:100',

        ]);

        $save=new client;
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
        $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
         if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        }
        else{
        return $request;
        $save->image='';
    }

        $save->save();
        return back();

    }


    public function storePi(Request $request)
    {
        $validatedData=$request->validate([
            'nomClient'=>'required|max:100',
            'prenomClient'=>'required|max:100',
            'numPieceID'=>'required|max:100',
            'emailClient'=>'required|max:100',

        ]);

        $save=new client;
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
        $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        }
        else{
            return $request;
            $save->image='';
        }

        $save->save();
            $piscines = DB::table('piscines')
                ->where('etat','=','0')
                ->get();
            $numPieceIDs = DB::table('clients')
                ->where('etat','=','0')
                ->get();
            return view ('back.respiscine.create2',compact('numPieceIDs','piscines'));
    }

    public function storeR(Request $request)
    {
        $validatedData=$request->validate([
            'nomClient'=>'required|max:100',
            'prenomClient'=>'required|max:100',
            'numPieceID'=>'required|max:100',
            'emailClient'=>'required|max:100',

        ]);

        $save=new client;
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
        $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        }
        else{
            return $request;
            $save->image='';
        }

        $save->save();
            $tables = DB::table('table_restaurants')
                ->where('etat','=','0')
                ->get();
            $numPieceIDs = DB::table('clients')
                ->where('etat','=','0')
                ->get();
            return view ('back.resrestaurant.create2',compact('numPieceIDs','tables'));
    }

    public function storePk(Request $request)
    {
        $validatedData=$request->validate([
            'nomClient'=>'required|max:100',
            'prenomClient'=>'required|max:100',
            'numPieceID'=>'required|max:100',
            'emailClient'=>'required|max:100',

        ]);

        $save=new client;
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
        $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        }
        else{
            return $request;
            $save->image='';
        }

        $save->save();
            $parkings = DB::table('parkings')
                ->where('etat','=','0')
                ->get();
            $numPieceIDs = DB::table('clients')
                ->where('etat','=','0')
                ->get();
            return view ('back.resparking.create2',compact('numPieceIDs','parkings'));
    }

    public function storeC(Request $request)
    {
        $validatedData=$request->validate([
            'nomClient'=>'required|max:100',
            'prenomClient'=>'required|max:100',
            'numPieceID'=>'required|max:100',
            'emailClient'=>'required|max:100',

        ]);

        $save=new client;
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
        $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        }
        else{
            return $request;
            $save->image='';
        }

        $save->save();
            $chambres = DB::table('chambres')
                ->where('etat','=','0')
                ->get();
            $numPieceIDs = DB::table('clients')
                ->where('etat','=','0')
                ->get();
            return view ('back.reschambre.create2',compact('numPieceIDs','chambres'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($idclient)
    {
        $clients= DB::table('clients')
                    ->select('*')
                    ->whereRaw('idclient = ?',[$idclient])
                    ->get();
        return view('back.client.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($idclient)
    {
        $client=DB::table('clients')
        ->select('*')
        ->whereRaw('idclient = ?',[$idclient])
        ->get();
         return view('back.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idclient)
    {

        $save=client::find($idclient);
        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image= client::find($request->idclient);
        $rfile="uploads/image/" .$image->image;

        $check=@fopen($rfile, 'r');
        if(!$check){

        }
            else{
                unlink("uploads/image/" .$image->image);
            }
            $file=$request->file('image');
            $extension=$file->getclientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;

             }
        $save->nomClient=$request->nomClient;
        $save->prenomClient=$request->prenomClient;
        $save->telClient=$request->telClient;
         $save->numPieceID=$request->numPieceID;
        $save->adresseClient=$request->adresseClient;
        $save->emailClient=$request->emailClient;
       $save->save();
        return back()->with('message', "Le client a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($idclient)
    {

     $client = DB::table('clients')
                ->select('*')
                ->whereRaw("idclient = ?",[$idclient])
                ->first();
     $message='';
     $erreur='';
     if ($client->etat==0)
            {
            $message="client Supprime avec success";
            DB::table('clients')
                ->whereRaw("idclient = ?",[$idclient])
                ->delete();
             }
            else{ $erreur="Suppression du client non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    }

     public function state($idclient)
    {
        //
        $client =DB::table('clients')
        ->select('*')
        ->whereRaw('idclient = ?',[$idclient])
        ->first();

        if($client -> etat == 0){
            DB::table('clients')
            ->whereRaw('idclient = ?',[$idclient])
            ->update(['etat'=>1]);
            return redirect('back/client');
        } else{
            DB::table('clients')
            ->whereRaw('idclient = ?',[$idclient])
            ->update(['etat'=>0]);
            return redirect('back/client');
        }

    }

}
