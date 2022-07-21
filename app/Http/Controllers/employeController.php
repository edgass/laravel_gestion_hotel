<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe = employe::all();
        return view('back.employe.index', compact('employe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back.employe.create');
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
            'nomEmp'=>'required|max:100', 
            'prenomEmp'=>'required|max:100',
             'matEmp'=>'required|max:100',
            'emailEmp'=>'required|max:100',

        ]);
        $save=new employe;
        $save->nomEmp=$request->nomEmp;
        $save->prenomEmp=$request->prenomEmp;
        $save->telEmp=$request->telEmp;
        $save->matEmp=$request->matEmp;
        $save->adresseEmp=$request->adresseEmp;
        $save->emailEmp=$request->emailEmp;
        $save->fonctionEmp=$request->fonctionEmp;
        $save->salaireEmp=$request->salaireEmp;

        $save->save();
        return back()->with('message', "Le employe a bien ete fait !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($idemploye)
    {
        $employe=DB::table('employes')
        ->select('*')
        ->whereRaw('idemploye = ?',[$idemploye])
        ->get();
        return view('back.employe.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit( $idemploye)
    {
        $employe=DB::table('employes')
        ->select('*')
        ->whereRaw('idemploye = ?',[$idemploye])
        ->get();
         return view('back.employe.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idemploye)
    {
         $validatedData=$request->validate([
            'nomEmp'=>'required|max:100', 
            'prenomEmp'=>'required|max:100',
            'matEmp'=>'required|max:100',
            'emailEmp'=>'required|max:100', 
        ]);
        $save=employe::find($idemploye);
        $save->nomEmp=$request->nomEmp;
        $save->prenomEmp=$request->prenomEmp;
        $save->telEmp=$request->telEmp;
        $save->matEmp=$request->matEmp;
        $save->adresseEmp=$request->adresseEmp;
        $save->emailEmp=$request->emailEmp;
        $save->fonctionEmp=$request->fonctionEmp;
        $save->salaireEmp=$request->salaireEmp;

          $save->save();
        return back()->with('message', "Le employe a bien ete modifie avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idemploye)
    {
     $employe=employe::findOrFail($idemploye);
     $message='';
     $erreur='';
     if ($employe->etat==0) 
            {
            $message="employe Supprime avec success";
            $employe->delete();
             } 
            else{ $erreur="Suppression du employe non autorise";}
            if ($message!='') 
            { return back()->with('message', $message);}
           else
           { return back()->with('erreur', $erreur);
            }
    }
    public function state($idemploye)
    {$employe =DB::table('employes')
        ->select('*')
        ->whereRaw('idemploye = ?',[$idemploye])
        ->first();

        if($employe -> etat == 0){
            DB::table('employes')
            ->whereRaw('idemploye = ?',[$idemploye])
            ->update(['etat'=>1]);
            return redirect('back/employe');
        } else{
            DB::table('employes')
            ->whereRaw('idemploye = ?',[$idemploye])
            ->update(['etat'=>0]);
            return redirect('back/employe');
        }
        
    }
}
