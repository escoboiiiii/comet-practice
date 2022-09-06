<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndPages extends Controller
{
    public function home(){
        $silder_data = Slider::latest() -> get();
        return view('frontend.f-pages.home',[
            'slider' => $silder_data
        ]);
    }
}
