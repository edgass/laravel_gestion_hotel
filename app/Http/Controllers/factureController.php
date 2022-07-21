<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = DB::table('facture')
                    ->select('*')
                    ->get();
        return view('back.Facturation.index',compact('factures'));
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
        $typefacture = DB::table('facture')
            ->whereRaw("idFacture = ?",[$id])
            ->value('typeFacture');
        $idclient = DB::table('facture')
                    ->whereRaw("idFacture = ?",[$id])
                    ->value('idclient');
        $client = DB::table('clients')
                    ->select('*')
                    ->whereRaw("idclient = ?",[$idclient])
                    ->first();
        $prestations = DB::table('prestation')
                    ->select('*')
                    ->whereRaw("idFacture = ?",[$id])
                    ->get();
        return view('back.Facturation.show',compact('client','prestations','id'));
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

    public function print($idFacture)
    {
        $facture = DB::table('facture')
                    ->select('*')
                    ->whereRaw("idfacture = ?",[$idFacture])
                    ->first();
        $idclient = DB::table('facture')
            ->whereRaw("idfacture = ?",[$idFacture])
            ->value('idclient');
        $client = DB::table('clients')
            ->select('*')
            ->whereRaw("idclient = ?",[$idclient])
            ->first();
        $prestations = DB::table('prestation')
            ->select('*')
            ->whereRaw("idFacture = ?",[$idFacture])
            ->get();
        $pdf = PDF::loadView('back.Facturation.pdf',compact('facture','client','prestations'))->setOptions(['defaultFont' => 'sans-serif']);;
        set_time_limit(300);

        return $pdf->download('facture.pdf');
    }

    public function state($idreschambre)
    {

        $reschambre = DB::table('facture')
            ->select('*')
            ->whereRaw('idFacture = ?', [$idreschambre])
            ->first();

        if ($reschambre->etat == 0) {
            DB::table('facture')
                ->whereRaw('idFacture = ?', [$idreschambre])
                ->update(['etat' => 1]);
            DB::table('prestation')
                ->whereRaw('idFacture = ?', [$idreschambre])
                ->update(['etat' => 1]);
            $this->print($idreschambre);
            return back();
        } else {
            DB::table('facture')
                ->whereRaw('idFacture = ?', [$idreschambre])
                ->update(['etat' => 0]);
            return back();
        }
    }
}
