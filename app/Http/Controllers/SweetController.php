<?php

namespace App\Http\Controllers;

use App\Models\Sweet;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreSweetRequest;
use App\Http\Requests\UpdateSweetRequest;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sweets = Sweet::all();
        $row_first_term = Sweet::all();

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dasboard.pages.SweetPoding.index', compact('sweets', 'row_first_term'));
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
    public function store(StoreSweetRequest $request)
    {
        // dd($request->all());

        $request->validate([
            'date_A' => 'required|date',
            'last_term_I' => 'required|integer',
        ]);

        $sweet = new Sweet();
        $sweet->first_term_B = $request->first_term_B;

        if (!$sweet->first_term_B) {
            $last_first_term = Sweet::all();
            // dd($last_first_term->last()->last_term_I);
            $sweet->first_term_B = $last_first_term->last()->last_term_I;
        }

        $sweet->date_A = $request->date_A;
        $sweet->sales_G = $request->sales_G;
        $sweet->last_term_I = $request->last_term_I;
        $sweet->harmony_F = $request->harmony_F;
        $sweet->come_in_C = $request->come_in_C;
        $sweet->convert_from_D = $request->convert_from_D;
        $sweet->convert_to_E = $request->convert_to_E;
        $sweet->save();

        // first term sweet
        // if ($sweet) {
        //     // = (I3)
        //     // $first_term = 0;

        //     $value = Sweet::where('id', $sweet->id)->first();
        //     $first_term = new Sweet();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // residual sweet
        if ($sweet) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($sweet as $value) {
                $value = Sweet::where('id', $sweet->id)->first();
                // dd($value);
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }


        // disability sweet
        if ($sweet) {
            // = (I3-H3)
            $disability = 0;

            foreach ($sweet as $value) {
                # code...
                $value = Sweet::where('id', $sweet->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // dd($sweet);
        return redirect()->route('dashboard.sweetpoding.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sweet $sweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sweet $sweet, $id)
    {
        $sweet = Sweet::find($id);
        return view('dasboard.pages.SweetPoding.edit', compact('sweet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSweetRequest $request, Sweet $sweet,$id)
    {
        // dd($request->all());

        $sweet =  Sweet::find($id);
        $sweet->first_term_B = $request->first_term_B;
        $sweet->date_A = $request->date_A;
        $sweet->sales_G = $request->sales_G;
        $sweet->last_term_I = $request->last_term_I;
        $sweet->harmony_F = $request->harmony_F;
        $sweet->come_in_C = $request->come_in_C;
        $sweet->convert_from_D = $request->convert_from_D;
        $sweet->convert_to_E = $request->convert_to_E;
        $sweet->update();

        // residual sweet
        if ($sweet) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($sweet as $value) {
                $value = Sweet::where('id', $sweet->id)->first();
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }

        // disability sweet
        if ($sweet) {
            // = (I3-H3)
            $disability = 0;

            foreach ($sweet as $value) {
                # code...
                $value = Sweet::where('id', $sweet->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // first term sweet
        // if ($sweet) {
        //     // = (I3)
        //     // $first_term = 0;
        //     $value = Sweet::where('id', $sweet->id)->first();
        //     $first_term = new Sweet();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // dd($sweet);
        return redirect()->route('dashboard.sweetpoding.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sweet $sweet, $id)
    {
        // dd($id);
        $sweet = Sweet::find($id)->delete();
        // session()->flash('success',trans('record deleted successfully'));
        return redirect()->back();
    }
}
