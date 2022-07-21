<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comptabilite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestationsH = DB::table('prestation')
                            ->select('*')
                            ->where('typeprestation','=','Réservation de chambre')
                            ->where('etat','=','1')
                            ->get();

        $prestationsR = DB::table('prestation')
                            ->select('*')
                            ->where('typeprestation','=','Réservation de restaurant')
                            ->where('etat','=','1')
                            ->get();

        $prestationsPi = DB::table('prestation')
                            ->select('*')
                            ->where('typeprestation','=','Réservation de piscine')
                            ->where('etat','=','1')
                            ->get();

        $prestationsPk = DB::table('prestation')
                            ->select('*')
                            ->where('typeprestation','=','Parking')
                            ->where('etat','=','1')
                            ->get();
        $salaires =
        return view('Back office.Comptabilite.index', compact('prestationsPi','prestationsPk','prestationsR','prestationsH'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

