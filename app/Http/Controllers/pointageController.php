<?php

namespace App\Http\Controllers;

use App\Models\pointage;
use Illuminate\Http\Request;

class pointageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointage = pointage::all();
        return view('back.pointage.index', compact('pointage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.pointage.create');
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
        $save=new pointage;
        $save->numeroplace=$request->numeroplace;
        $save->nbrjour=$request->nbrjour;
        $save->prixjour=$request->prixjour;
        $save->nbrplace=$request->nbrplace;         
        
        $save->save();
        return back()->with('message', "Le pointage a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pointage=pointage::findOrFail($id);
        return view('back.pointage.show', compact('pointage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pointage=pointage::findOrFail($id);
         return view('back.pointage.edit', compact('pointage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'numeroplace'=>'required|max:100', 
           
        ]);
        $save=pointage::find($id);

        $save->numeroplace=$request->numeroplace;
        $save->nbrjour=$request->nbrjour;
        $save->prixjour=$request->prixjour;
        $save->nbrplace=$request->nbrplace;
       $save->save();
        return back()->with('message', "Le pointage a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
     $pointage=pointage::findOrFail($id);
     $message='';
     $erreur='';
     if ($pointage->etat==0) 
            {
            $message="pointage Supprime avec success";
            $pointage->delete();
             } 
            else{ $erreur="Suppression du pointage non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
    }
    } 

     public function state($id)
    {
        //
        $pointage = pointage::find($id);

        if($pointage -> etat == 0){
            $pointage -> etat = 1;
            $message='pointage active';
            $pointage -> update();
            return redirect('back/pointage');
        } else{
            $pointage -> etat = 0;
            $message='pointage desactive';
            $pointage -> update();
            return redirect('back/pointage');
        }
        
    }

}
