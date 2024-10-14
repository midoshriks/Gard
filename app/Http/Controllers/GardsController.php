<?php

namespace App\Http\Controllers;

use App\Models\Gard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gard = Gard::all();
        return view('gard.index', compact('gard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $com_in = Gard::find($request->id);
        // dd($com_in);
        $com_in->C = $request->C;
        $com_in->update();
    }

    /**
     * Display the specified resource.
     */
    public function show(Gard $gard)
    {
        $gard = Gard::find($gard->id);
        return view('gard.create', compact('gard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gard $gard)
    {
        $gard = Gard::find($gard->id);
        return view('gard.edit', compact('gard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gard $gard)
    {
        dd($request->all());

        $gard = Gard::find($gard->id);
        $gard->I = $request->I;
        $gard->G = $request->G;
        // $gard->A = Carbon::now();
        // dd('y',$gard->A);
        $gard->update();

        $new_gard = new Gard;
        $new_gard->B = $gard->I;
        $new_gard->save();

        $gard->I;
        // dd('e', $gard->I);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gard $gard)
    {
        //
    }
}
