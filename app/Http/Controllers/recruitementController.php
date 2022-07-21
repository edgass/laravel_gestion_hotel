<?php

namespace App\Http\Controllers;

use App\Models\recruitement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Intervention\Image\Exception\NotReadebleException;


class recruitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitement = recruitement::all();
        return view('back.recruitement.index', compact('recruitement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.recruitement.create');
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
            'nomCand'=>'required|max:100', 
            'prenomCand'=>'required|max:100',
            'emailCand'=>'required|max:100',

        ]);
        $save=new recruitement;
        $save->nomCand=$request->nomCand;
        $save->prenomCand=$request->prenomCand;
        $save->telCand=$request->telCand;
        $save->adresseCand=$request->adresseCand;
        $save->emailCand=$request->emailCand;
        $save->paysResidance=$request->paysResidance;
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
        return back()->with('message', "Le recruitement a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recruitement  $recruitement
     * @return \Illuminate\Http\Response
     */
    public function show($idrecruitement)
    {
        $recruitement= DB::table('recruitements')
                    ->select('*')
                    ->whereRaw('idrecruitement = ?',[$idrecruitement])
                    ->get();
        return view('back.recruitement.show', compact('recruitement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recruitement  $recruitement
     * @return \Illuminate\Http\Response
     */
    public function edit( $idrecruitement)
    {
        $recruitement= DB::table('recruitements')
        ->select('*')
        ->whereRaw('idrecruitement = ?',[$idrecruitement])
        ->get();
         return view('back.recruitement.edit', compact('recruitement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recruitement  $recruitement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idrecruitement)
    {
        $validatedData=$request->validate([
            'nomCand'=>'required|max:100', 
            'prenomCand'=>'required|max:100',
            'emailCand'=>'required|max:100', 
        ]);
         $save=recruitement::find($idrecruitement);
        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image=recruitement::find($request->id);
        $rfile="uploads/image/" .$image->image;
        
        $check=@fopen($rfile, 'r');
        if(!$check){

        }
            else{
                unlink("uploads/image/" .$image->image);
            }
            $file=$request->file('image');
            $extension=$file->getclientOriginalExtension();
            $filename='aliou'.time().'.'.$extension;
            $destinationPath=public_path('/uploads/image');
            $resize_image=Image::make($file->getRealPath());
            $resize_image->resize(1000, 800)->save($destinationPath.'/'.$filename);
            $destinationPath=$request->file('image')->store('uploads/image');
            $save->image=$filename;
        
             }
        $save->nomCand=$request->nomCand;
        $save->prenomCand=$request->prenomCand;
        $save->telCand=$request->telCand;
        $save->adresseCand=$request->adresseCand;
        $save->emailCand=$request->emailCand;
        $save->paysResidance=$request->paysResidance;
       $save->save();
        return back()->with('message', "Le recruitement a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recruitement  $recruitement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idrecruitement)
    {
         $recruitement=recruitement::findOrFail($idrecruitement);
     $message='';
     $erreur='';
     if ($recruitement->etat==1) 
            {
            $message="recruitement Supprime avec success";
            $recruitement->delete();
             } 
            else{ $erreur="Suppression du recruitement non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    }
     public function state($idrecruitement)
    {
        $recruitement =DB::table('recruitements')
        ->select('*')
        ->whereRaw('idrecruitement = ?',[$idrecruitement])
        ->first();

        if($recruitement -> etat == 0){
            DB::table('recruitements')
            ->whereRaw('idrecruitement = ?',[$idrecruitement])
            ->update(['etat'=>1]);
            return redirect('back/recruitement');
        } else{
            DB::table('recruitements')
            ->whereRaw('idrecruitement = ?',[$idrecruitement])
            ->update(['etat'=>0]);
            return redirect('back/recruitement');
        }
        
    }
}
