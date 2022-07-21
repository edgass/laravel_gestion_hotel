<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\table_restaurant;
use Illuminate\Http\Request;
use Image;

class table_restaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table_restaurant = table_restaurant::all();
        return view('back.table_restaurant.index', compact('table_restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.table_restaurant.create');
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
            'numerotable'=>'required|max:100',


        ]);
        $save=new table_restaurant;
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
        $save->numerotable=$request->numerotable;
        $save->nbrpersonne=$request->nbrpersonne;

        $save->save();
        return back()->with('message', "Le table_restaurant a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table_restaurant  $table_restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($idtable_restaurant)
    {
        $table_restaurant=DB::table('table_restaurants')
    ->select('*')
    ->whereRaw('idtable_restaurant = ?',[$idtable_restaurant])
    ->get();
        return view('back.table_restaurant.show', compact('table_restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table_restaurant  $table_restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($idtable_restaurant)
    {
        $table_restaurant=DB::table('table_restaurants')
        ->select('*')
        ->whereRaw('idtable_restaurant = ?',[$idtable_restaurant])
        ->get();
         return view('back.table_restaurant.edit', compact('table_restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\table_restaurant  $table_restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idtable_restaurant)
    {
        $validatedData=$request->validate([
            'numerotable'=>'required|max:100',

        ]);
        $save=table_restaurant::find($idtable_restaurant);
        if($request->hasfile('image')){
        $request->validate(['image'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048']);
        $image=chambre::find($request->id);
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

        $save->numerotable=$request->numerotable;
        $save->nbrpersonne=$request->nbrpersonne;
        $save->nbrplace=$request->nbrplace;
       $save->save();
        return back()->with('message', "Le table_restaurant a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table_restaurant  $table_restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtable_restaurant)
    {

     $table_restaurant=table_restaurant::findOrFail($idtable_restaurant);
     $message='';
     $erreur='';
     if ($table_restaurant->etat==1)
            {
            $message="table_restaurant Supprime avec success";
            $table_restaurant->delete();
             }
            else{ $erreur="Suppression du table_restaurant non autorise";}
            if ($message!='')
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    }

     public function state($idtable_restaurant)
    {
        $table_restaurant =DB::table('table_restaurants')
        ->select('*')
        ->whereRaw('idtable_restaurant = ?',[$idtable_restaurant])
        ->first();

        if($table_restaurant -> etat == 0){
            $affected = DB::table('table_restaurants')
                            ->whereRaw('idtable_restaurant = ?',[$idtable_restaurant])
                            ->update(['etat'=>1]);
            return redirect('back/table_restaurant');
        } else{
            $affected = DB::table('table_restaurants')
                ->whereRaw('idtable_restaurant = ?',[$idtable_restaurant])
                ->update(['etat'=>0]);
            return redirect('back/table_restaurant');
        }

    }

    }


