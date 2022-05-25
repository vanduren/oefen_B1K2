<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\Klant;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class BestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (FacadesGate::allows('isPicker')) {
            $bestellingen = Bestelling::where('afgerond', 0)->get();
            return view('bestellingen.picker.index', ['bestellingen' => $bestellingen]);
        }elseif(FacadesGate::allows('isVerkoper')){
            $bestellingen = Bestelling::all();
            return view('bestellingen.verkoper.index', ['bestellingen' => $bestellingen]);
        }

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
     * @param  \App\Models\Bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function show(Bestelling $bestelling)
    {
        dd($bestelling);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function edit(Bestelling $bestelling)
    {
        return view('bestellingen.verkoper.edit', ['bestelling' => $bestelling]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bestelling $bestelling)
    {
        if($request->has('afgerond'))
        {
            $bestelling->update([
                'afgerond' => 1,
            ]);
            return redirect(route('bestelling.index'))->with('success', 'Bestelling is afgehandeld');
        }
        else
        {
            dd('test');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bestelling  $bestelling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bestelling $bestelling)
    {
        //
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        // $klanten = Klant::query()
        //     ->where('bedrijfsnaam', 'LIKE', "%{$search}%")
        //     ->orWhere('contactpersoon', 'LIKE', "%{$search}%")
        //     ->select('id')
        //     ->get()
        //     ->toArray();
        // $klantids = array_column($klanten, 'id');
        // $bestellingen = Bestelling::whereIn('klant_id', $klantids)->get();
        // dd($bestellingen);
        $bestellingen = Bestelling::query()
            ->where('id', 'LIKE', "%{$search}%")
            ->orWhereIn('klant_id', array_column(Klant::query()
                ->where('bedrijfsnaam', 'LIKE', "%{$search}%")
                ->orWhere('contactpersoon', 'LIKE', "%{$search}%")
                ->select('id')
                ->get()
                ->toArray()
                , 'id')
            )
            ->get();

        // Return the search view with the resluts compacted
        if(FacadesGate::allows('isPicker')){
            return view('bestellingen.picker.index', ['bestellingen' => $bestellingen]);
        }elseif(FacadesGate::allows('isVerkoper')){
            return view('bestellingen.verkoper.index', ['bestellingen' => $bestellingen]);
        }
    }
}
