<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\MobilAttachment;

class LandingController extends Controller
{
    public function index()
    {
        $data = Mobil::where('status',1)->get();
        return view('index',
        [
            'data' => $data
        ]);
    }
}
