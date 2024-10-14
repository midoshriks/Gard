<?php

namespace App\Http\Controllers;

use App\Models\SweetProduction;
use App\Http\Requests\StoreSweetProductionRequest;
use App\Http\Requests\UpdateSweetProductionRequest;

class SweetProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sweet_productions = SweetProduction::all();

        $milka = SweetProduction::all();
        $count_milka = 0;
        foreach ($milka as $value) {
            # code...
            $count_milka += $value->pure_milka_B;
            // dd($milka, $value->pure_milka_B);
        }

        $boxes = SweetProduction::all();
        $count_boxes = 0;
        foreach ($boxes as $value) {
            # code...
            $count_boxes += $value->boxes_C;
        }

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        // dd($milka, $count_boxes);

        // dd($sweet_productions);
        return view('dasboard.pages.SweetProduction.index', compact('sweet_productions', 'count_milka', 'count_boxes'));
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
    public function store(StoreSweetProductionRequest $request)
    {
        $request->validate([
            'date_A' => 'required|date',
            'pure_milka_B' => 'required|integer',
            'boxes_C' => 'required|integer',
        ]);

        // dd($request->all(), $sweet_productions);
        $sweet_productions = new SweetProduction();
        $sweet_productions->date_A = $request->date_A;
        $sweet_productions->pure_milka_B = $request->pure_milka_B;
        $sweet_productions->boxes_C = $request->boxes_C;
        $sweet_productions->convert_from_D = $request->convert_from_D;
        $sweet_productions->convert_to_E = $request->convert_to_E;
        $sweet_productions->harmony_F = $request->harmony_F;
        $sweet_productions->a_cook_G = $request->a_cook_G;
        $sweet_productions->save();

        return redirect()->route('dashboard.sweetProduction.index');

        // return view('dasboard.pages.SweetProduction.index', compact('sweet_productions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SweetProduction $sweetProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SweetProduction $sweetProduction)
    {
        $sweet_product = SweetProduction::find($sweetProduction->id);
        return view('dasboard.pages.SweetProduction.edit', compact('sweet_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSweetProductionRequest $request, SweetProduction $sweetProduction)
    {

        // dd($request->all());

        $sweet_product = SweetProduction::find($sweetProduction->id);
        $sweet_product->date_A = $request->date_A;
        $sweet_product->pure_milka_B = $request->pure_milka_B;
        $sweet_product->boxes_C = $request->boxes_C;
        $sweet_product->convert_from_D = $request->convert_from_D;
        $sweet_product->convert_to_E = $request->convert_to_E;
        $sweet_product->harmony_F = $request->harmony_F;
        $sweet_product->a_cook_G = $request->a_cook_G;
        $sweet_product->update();

        return redirect()->route('dashboard.sweetProduction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SweetProduction $sweetProduction)
    {
        $sweet_product = SweetProduction::find($sweetProduction->id)->delete();
        // session()->flash('success',trans('record deleted successfully'));
        return redirect()->back();
    }
}
