<?php

namespace App\Http\Controllers;

use App\Models\chambre;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Exception\NotReadebleException;

class chambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambre = chambre::all();
        return view('back.chambre.index', compact('chambre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.chambre.create');
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
            'prixChambre'=>'required|max:100',
            'nombre_personne'=>'required|max:100',
        ]);
        $save=new chambre;
        $save->numeroChambre=$request->numeroChambre;
        $save->tailleChambre=$request->tailleChambre;
        $save->prixChambre=$request->prixChambre;
        $save->nombre_personne=$request->nombre_personne;
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
        return back()->with('message', "Le chambre a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function show($idchambre)
    {
        $chambre=DB::table('chambres')
        ->select('*')
        ->whereRaw('idchambre = ?',[$idchambre])
        ->get();
        return view('back.chambre.show', compact('chambre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function edit( $idchambre)
    {
       $chambre=DB::table('chambres')
       ->select('*')
       ->whereRaw('idchambre = ?',[$idchambre])
       ->get();
         return view('back.chambre.edit', compact('chambre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idchambre)
    {
        $validatedData=$request->validate([
            'prixChambre'=>'required|max:100',
            'nombre_personne'=>'required|max:100',

        ]);
       $save=chambre::find($idchambre);
        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image=chambre::find($request->idchambre);
        $rfile="uploads/image/" .$image->image;

        $check=@fopen($rfile, 'r');
        if(!$check){

        }
            else{
                unlink("uploads/image/" .$image->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='aliou'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;

             }
        $save->numeroChambre=$request->numeroChambre;
        $save->tailleChambre=$request->tailleChambre;
        $save->prixChambre=$request->prixChambre;
        $save->nombre_personne=$request->nombre_personne;
       $save->save();
        return back()->with('message', "Le chambre a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chambre  $chambre
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idchambre)
    {
        $chambre=chambre::findOrFail($idchambre);
     $message='';
     $erreur='';
     if ($chambre->etat==0)
            {
            $message="chambre Supprime avec success";
            $chambre->delete();
             }
            else{ $erreur="Suppression du chambre non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    }
     public function state($idchambre)
    {$chambre =DB::table('chambres')
        ->select('*')
        ->whereRaw('idchambre = ?',[$idchambre])
        ->first();

        if($chambre -> etat == 0){
            DB::table('chambres')
            ->whereRaw('idchambre = ?',[$idchambre])
            ->update(['etat'=>1]);
            return redirect('back/chambre');
        } else{
            DB::table('chambres')
            ->whereRaw('idchambre = ?',[$idchambre])
            ->update(['etat'=>0]);
            return redirect('back/chambre');
        }


    }
}
