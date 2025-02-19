<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sp;

class SpController extends Controller
{
    public function sp(){
        $spdata = sp::all();
        
        return view('sp', compact('spdata'));
    }
}
