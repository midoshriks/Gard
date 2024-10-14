<?php

namespace App\Http\Controllers;

use App\Models\BigWater;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreBigWaterRequest;
use App\Http\Requests\UpdateBigWaterRequest;

class BigWaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bigwaters = BigWater::all();
        $row_first_term = BigWater::all();

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dasboard.pages.BigWater.index', compact('bigwaters', 'row_first_term'));
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
    public function store(StoreBigWaterRequest $request)
    {
        // dd($request->all());

        $bigwater = new BigWater();
        $bigwater->first_term_B = $request->first_term_B;

        if (!$bigwater->first_term_B) {
            $last_first_term = BigWater::all();
            // dd($last_first_term->last()->last_term_I);
            $bigwater->first_term_B = $last_first_term->last()->last_term_I;
        }

        $bigwater->date_A = $request->date_A;
        $bigwater->sales_G = $request->sales_G;
        $bigwater->last_term_I = $request->last_term_I;
        $bigwater->harmony_F = $request->harmony_F;
        $bigwater->come_in_C = $request->come_in_C;
        $bigwater->convert_from_D = $request->convert_from_D;
        $bigwater->convert_to_E = $request->convert_to_E;
        $bigwater->save();

        // first term bigwater
        // if ($bigwater) {
        //     // = (I3)
        //     // $first_term = 0;

        //     $value = BigWater::where('id', $bigwater->id)->first();
        //     $first_term = new BigWater();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // residual bigwater
        if ($bigwater) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($bigwater as $value) {
                $value = BigWater::where('id', $bigwater->id)->first();
                // dd($value);
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }


        // disability bigwater
        if ($bigwater) {
            // = (I3-H3)
            $disability = 0;

            foreach ($bigwater as $value) {
                # code...
                $value = BigWater::where('id', $bigwater->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // dd($bigwater);
        return redirect()->route('dashboard.bigwater.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BigWater $bigWater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BigWater $bigWater, $id)
    {
        $bigwater = BigWater::find($id);
        return view('dasboard.pages.BigWater.edit', compact('bigwater'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBigWaterRequest $request, BigWater $bigWater, $id)
    {
        // dd($request->all());

        $bigwater =  BigWater::find($id);
        $bigwater->first_term_B = $request->first_term_B;
        $bigwater->date_A = $request->date_A;
        $bigwater->sales_G = $request->sales_G;
        $bigwater->last_term_I = $request->last_term_I;
        $bigwater->harmony_F = $request->harmony_F;
        $bigwater->come_in_C = $request->come_in_C;
        $bigwater->convert_from_D = $request->convert_from_D;
        $bigwater->convert_to_E = $request->convert_to_E;
        $bigwater->update();

        // residual bigwater
        if ($bigwater) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($bigwater as $value) {
                $value = BigWater::where('id', $bigwater->id)->first();
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }

        // disability bigwater
        if ($bigwater) {
            // = (I3-H3)
            $disability = 0;

            foreach ($bigwater as $value) {
                # code...
                $value = BigWater::where('id', $bigwater->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // first term bigwater
        // if ($bigwater) {
        //     // = (I3)
        //     // $first_term = 0;
        //     $value = BigWater::where('id', $bigwater->id)->first();
        //     $first_term = new BigWater();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // dd($bigwater);
        return redirect()->route('dashboard.bigwater.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BigWater $bigWater, $id)
    {
        // dd($id);
        $bigwater = BigWater::find($id)->delete();
        // session()->flash('success',trans('record deleted successfully'));
        return redirect()->back();
    }
}
