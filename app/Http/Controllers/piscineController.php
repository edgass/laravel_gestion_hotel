<?php

namespace App\Http\Controllers;
use App\Models\client;
use Illuminate\Support\Facades\DB;
use App\Models\piscine;
use Illuminate\Http\Request;
use Image;
class piscineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piscine = piscine::all();
        return view('back.piscine.index', compact('piscine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.piscine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save=new piscine;
        $save->prixPiscine=$request->prixPiscine;
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
        return back()->with('message', "Le piscine a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\piscine  $piscine
     * @return \Illuminate\Http\Response
     */
    public function show($idpiscine)
    {
        $piscine=DB::table('piscines')
        ->select('*')
        ->whereRaw('idpiscine = ?',[$idpiscine])
        ->get();
        return view('back.piscine.show', compact('piscine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\piscine  $piscine
     * @return \Illuminate\Http\Response
     */
    public function edit($idpiscine)
    {
        $piscine=DB::table('piscines')
       ->select('*')
       ->whereRaw('idpiscine = ?',[$idpiscine])
       ->get();
         return view('back.piscine.edit', compact('piscine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\piscine  $piscine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpiscine)
    {
        $validatedData=$request->validate([
            'prixheur'=>'required|max:100',

        ]);
        $save=piscine::find($idpiscine);
        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image=piscine::find($request->id);
        $rfile="uploads/image/" .$image->image;

        $check=@fopen($rfile, 'r');
        if(!$check){

        }
            else{
                unlink("uploads/image/" .$image->image);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename='Badroudine'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;

             }

         $save->prixheur=$request->prixheur;

       $save->save();
        return back()->with('message', "Le piscine a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\piscine  $piscine
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpiscine)
    {

     $piscine=piscine::findOrFail($idpiscine);
     $message='';
     $erreur='';
     if ($piscine->etat==1)
            {
            $message="piscine Supprime avec success";
            $piscine->delete();
             }
            else{ $erreur="Suppression du piscine non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    }

     public function state($idpiscine)
    {
        $piscine =DB::table('piscines')
        ->select('*')
        ->whereRaw('idpiscine = ?',[$idpiscine])
        ->first();

        if($piscine -> etat == 0){
            DB::table('piscines')
            ->whereRaw('idpiscine = ?',[$idpiscine])
            ->update(['etat'=>1]);
            return redirect('back/piscine');
        } else{
            DB::table('piscines')
            ->whereRaw('idpiscine = ?',[$idpiscine])
            ->update(['etat'=>0]);
            return redirect('back/piscine');
        }



    }

}
