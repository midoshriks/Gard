<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SweetProduction extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function count_pure_milk()
    // {
    //     $count_milka = SweetProduction::all();
    //     $milka = 0;
    //     foreach ($count_milka as $value) {
    //         # code...
    //         $milka += $value->pure_milka_B;
    //     }
    //     // dd($milka, $value->pure_milka_B);

    //     return $milka;
    // }

    // public function count_boxes()
    // {
    //     $count_boxes = SweetProduction::all();
    //     $boxes = 0;
    //     foreach ($count_boxes as $value) {
    //         # code...
    //         $boxes += $value->boxes_c;
    //     }

    //     return $boxes;
    // }
}
