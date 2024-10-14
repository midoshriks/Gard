<?php

namespace App\Http\Controllers;

use App\Models\PepsiPlastic;
use Illuminate\Support\Carbon;
use App\Http\Requests\StorePepsiPlasticRequest;
use App\Http\Requests\UpdatePepsiPlasticRequest;
use GuzzleHttp\Psr7\Request;

class PepsiPlasticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row_first_term = PepsiPlastic::all();
        $pepsiplastic = PepsiPlastic::all();
        // dd($row_first_term->first());

        $title = 'Delete row '.'!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dasboard.pages.PepsiPlastic.index', compact('pepsiplastic', 'row_first_term'));
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
    public function store(StorePepsiPlasticRequest $request)
    {
        // dd($request->all());

        $request->validate([
            'date_A' => 'required|date',
            'last_term_I' => 'required|integer',
        ]);

        $pepsiplastic = new PepsiPlastic();
        $pepsiplastic->first_term_B = $request->first_term_B;

        if (!$pepsiplastic->first_term_B) {
            $last_first_term = PepsiPlastic::all();
            // dd($last_first_term->last()->last_term_I);
            $pepsiplastic->first_term_B = $last_first_term->last()->last_term_I;
        }

        $pepsiplastic->date_A = $request->date_A;
        $pepsiplastic->sales_G = $request->sales_G;
        $pepsiplastic->last_term_I = $request->last_term_I;
        $pepsiplastic->harmony_F = $request->harmony_F;
        $pepsiplastic->come_in_C = $request->come_in_C;
        $pepsiplastic->convert_from_D = $request->convert_from_D;
        $pepsiplastic->convert_to_E = $request->convert_to_E;
        $pepsiplastic->save();

        // first term pepsiplastic
        // if ($pepsiplastic) {
        //     // = (I3)
        //     // $first_term = 0;

        //     $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
        //     $first_term = new PepsiPlastic();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // residual pepsiplastic
        if ($pepsiplastic) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($pepsiplastic as $value) {
                $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
                // dd($value);
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }


        // disability pepsiplastic
        if ($pepsiplastic) {
            // = (I3-H3)
            $disability = 0;

            foreach ($pepsiplastic as $value) {
                # code...
                $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }


        // dd($pepsiplastic);
        return redirect()->route('dashboard.pepsiplastic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PepsiPlastic $pepsiPlastic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PepsiPlastic $pepsiPlastic, $id)
    {
        $pepsiplastic = PepsiPlastic::find($id);
        return view('dasboard.pages.PepsiPlastic.edit', compact('pepsiplastic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePepsiPlasticRequest $request, PepsiPlastic $pepsiPlastic, $id)
    {
        // dd($request->all());

        $pepsiplastic =  PepsiPlastic::find($id);
        $pepsiplastic->first_term_B = $request->first_term_B;
        $pepsiplastic->date_A = $request->date_A;
        $pepsiplastic->sales_G = $request->sales_G;
        $pepsiplastic->last_term_I = $request->last_term_I;
        $pepsiplastic->harmony_F = $request->harmony_F;
        $pepsiplastic->come_in_C = $request->come_in_C;
        $pepsiplastic->convert_from_D = $request->convert_from_D;
        $pepsiplastic->convert_to_E = $request->convert_to_E;
        $pepsiplastic->update();

        // residual pepsiplastic
        if ($pepsiplastic) {
            $residual = 0;
            // = (B3+C3+D3)-(E3+F3+G3)
            foreach ($pepsiplastic as $value) {
                $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
                // dd($value->first_term_B , $value->come_in_C , $value->convert_from_D,  $value->convert_to_E , $value->harmony_F , $value->sales_G);
                $residual = ($value->first_term_B + $value->come_in_C + $value->convert_from_D) - ($value->convert_to_E + $value->harmony_F + $value->sales_G);
                // dd($residual);
                $value->residual_H = $residual;
                $value->update();
            }
        }

        // disability pepsiplastic
        if ($pepsiplastic) {
            // = (I3-H3)
            $disability = 0;

            foreach ($pepsiplastic as $value) {
                # code...
                $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
                // dd($value->residual_H);
                // dd($value->last_term_I , $value->residual_H);
                $disability = ($value->last_term_I - $value->residual_H); // $value->residual() = $value->H
                $value->disability_j = $disability;
                // dd($disability);
                $value->update();
            }
        }

        // if ($pepsiplastic) {
        //     // = (I3)
        //     // $first_term = 0;
        //     $value = PepsiPlastic::where('id', $pepsiplastic->id)->first();
        //     $first_term = new PepsiPlastic();
        //     $first_term->first_term_B = $value->last_term_I;
        //     $first_term->date_A = Carbon::now();
        //     $first_term->save();
        // }

        // dd($pepsiplastic);
        return redirect()->route('dashboard.pepsiplastic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PepsiPlastic $pepsiPlastic, $id)
    {
        // dd($id);
        $pepsiplastic = PepsiPlastic::find($id)->delete();
        // session()->flash('success',trans('record deleted successfully'));
        return redirect()->back();
    }
}
