<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Bestelling;
use App\Models\BestellingRegel;
use App\Models\Eenheid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BestellingRegelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bestelling = Bestelling::where('id', $request->bestelling)->first();
        if (Gate::allows('isPicker')) {
            return view('bestellingregels.picker.index', ['bestelling' => $bestelling]);
        }elseif(Gate::allows('isVerkoper')){
            return view('bestellingregels.verkoper.index', ['bestelling' => $bestelling]);
        }

        // dd($bestelling->bestellingRegels->first()->artikel->voorraadregels->last()->locatie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bestelling = Bestelling::where('id', $request->bestelling)->first();
        $artikelen = Artikel::all();
        $eenheden = Eenheid::all();
        return view('bestellingregels.verkoper.create', ['bestelling' => $bestelling,
                                                         'artikelen' => $artikelen,
                                                         'eenheden' => $eenheden]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        BestellingRegel::create([
            'bestelling_id' => $request->bestelling_id,
            'artikel_id' => $request->artikel_id,
            'eenheid_id' => $request->eenheid_id,
            'aantal' => $request->aantal,
        ]);

        return redirect(route('bestellingregel.index',  ['bestelling' => $request->bestelling_id]))->with('success', 'Bestellingregel toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BestellingRegel  $bestellingRegel
     * @return \Illuminate\Http\Response
     */
    public function show(BestellingRegel $bestellingRegel)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BestellingRegel  $bestellingRegel
     * @return \Illuminate\Http\Response
     */
    public function edit(BestellingRegel $bestellingregel)
    {
        // dd($bestellingregel);
        if (Gate::allows('isVerkoper')) {
            return view('bestellingregels.verkoper.edit', ['bestellingregel' => $bestellingregel]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BestellingRegel  $bestellingRegel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestellingRegel $bestellingregel)
    {
        // dd($request->all());
        if($request->picked_bestelregel == 1){
            $bestellingregel->update([
                'picked_bestelregel' => $request->picked_bestelregel,
            ]);
            return redirect()->back();
            // $bestellingregel->artikel->voorraadregels->last()->update([
            //     'voorraad' => $bestellingregel->artikel->voorraad - $bestellingregel->aantal,
            // ]);
        }
        // dd($request->all());
        $bestellingregel->update([
            'bestelling_id' => $request->bestelling_id,
            'artikel_id' => $request->artikel_id,
            'aantal' => $request->aantal,
            'eenheid_id' => $request->eenheid_id,
        ]);
        return redirect(route('bestellingregel.index', ['bestelling' => $bestellingregel->bestelling_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BestellingRegel  $bestellingRegel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestellingRegel $bestellingregel)
    {
        // dd($bestellingregel);
        $bestellingregel->delete();
        return redirect()->back();
    }
}
