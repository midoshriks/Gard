<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gard extends Model
{
    use HasFactory;
    protected $guarded=[];


    // public function first_term()
    // {
    //     // = (I3)

    //     $gard = Gard::all();
    //     $first_term = 0;

    //     // dd($gard);
    //     foreach ($gard as $key => $value) {
    //         # code...
    //         $value = Gard::where('id', $this->id)->first();
    //         $first_term = $value->I;
    //         // dd($first_term);
    //     }
    //     return $first_term;
    // }


    public function residual()
    {
        // = (B3+C3+D3)-(E3+F3+G3)
        // $gard = Gard::where('id', $this->id)->first();

        $gard = Gard::all();
        $residual = 0;
        // dd($gard);
        foreach ($gard as $key => $value) {
            # code...
            $value = Gard::where('id', $this->id)->first();
            $residual = ($value->B + $value->C + $value->D) - ($value->E + $value->F + $value->G);
            // dd($value,$residual);
            $value->H = $residual;
        }
        // $gard->update();


        return $residual;
    }

    public function disability()
    {
        // = (I3-H3)

        $gard = Gard::all();
        $disability = 0;
        // dd($gard);
        foreach ($gard as $key => $value) {
            # code...
            $value = Gard::where('id', $this->id)->first();
            $disability = ($value->I - $value->residual()); // $value->residual() = $value->H
            // dd($value,$disability);
        }
        return $disability;
    }
}
