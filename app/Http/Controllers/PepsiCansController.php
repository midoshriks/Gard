<?php

namespace App\Http\Controllers;

use App\Models\PepsiCans;
use Illuminate\Support\Carbon;
use App\Http\Requests\StorePepsiCansRequest;
use App\Http\Requests\UpdatePepsiCansRequest;

class PepsiCansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row_first_term = PepsiCans::all();
        $pepsicans = PepsiCans::all();

        // dd($row_first_term->first()->first_term_B);

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dasboard.pages.PepsiCans.index', compact('pepsicans','row_first_term'));
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
    public function store(StorePepsiCansRequest $request)
    {
        // dd($request->all());

        $request->validate([
            'date_A' => 'required|date',
            'last_term_I' => 'required|integer',
        ]);

        $pepsican = new PepsiCans();
        $pepsican->first_term_B = $request->first_term_B;

        if (!$pepsican->first_term_B) {
            $last_first_term = PepsiCans::all();
            // dd($last_first_term->last()->last_term_I);
            $pepsican->first_term_B = $last_first_term->last()->last_term_I;
        }

        $pepsican->date_A = $request->date_A;
        $pepsican->sales_G = $request->sales_G;
        $pepsican->last_term_I = $request->last_term_I;
        $pepsican->harmony_F = $request->harmony_F;
        $pepsican->come_in_C = $request->come_in_C;
        $pepsican->convert_from_D = $request->convert_from_D;
        $pepsican->convert_to_E = $request->convert_to_E;
        $pepsican->save();

        // first term pepsican
        // if ($pepsican) {
        //     // = (I3)
        //     // $first_term = 0;

        //     $value = PepsiCans::where('id', $pepsican->id)->first();
        //     $first_term = new PepsiCans();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // residual pepsican
        if ($pepsican) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($pepsican as $value) {
                $value = PepsiCans::where('id', $pepsican->id)->first();
                // dd($value);
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }


        // disability pepsican
        if ($pepsican) {
            // = (I3-H3)
            $disability = 0;

            foreach ($pepsican as $value) {
                # code...
                $value = PepsiCans::where('id', $pepsican->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }


        // dd($pepsican);
        return redirect()->route('dashboard.pepsi_cans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PepsiCans $pepsiCans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PepsiCans $pepsiCans, $id)
    {
        $pepsican = PepsiCans::find($id);
        return view('dasboard.pages.PepsiCans.edit', compact('pepsican'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePepsiCansRequest $request, PepsiCans $pepsiCans, $id)
    {
        // dd($request->all());

        $pepsican =  PepsiCans::find($id);
        $pepsican->first_term_B = $request->first_term_B;
        $pepsican->date_A = $request->date_A;
        $pepsican->sales_G = $request->sales_G;
        $pepsican->last_term_I = $request->last_term_I;
        $pepsican->harmony_F = $request->harmony_F;
        $pepsican->come_in_C = $request->come_in_C;
        $pepsican->convert_from_D = $request->convert_from_D;
        $pepsican->convert_to_E = $request->convert_to_E;
        $pepsican->update();

        // residual pepsican
        if ($pepsican) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($pepsican as $value) {
                $value = PepsiCans::where('id', $pepsican->id)->first();
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }

        // disability pepsican
        if ($pepsican) {
            // = (I3-H3)
            $disability = 0;

            foreach ($pepsican as $value) {
                # code...
                $value = PepsiCans::where('id', $pepsican->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // if ($pepsican) {
        //     // = (I3)
        //     // $first_term = 0;
        //     $value = PepsiCans::where('id', $pepsican->id)->first();
        //     $first_term = new PepsiCans();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // dd($pepsican);
        return redirect()->route('dashboard.pepsi_cans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PepsiCans $pepsiCans, $id)
    {
        // dd($id);
        $pepsican = PepsiCans::find($id)->delete();
        // session()->flash('success',trans('record deleted successfully'));
        return redirect()->back();
    }
}
