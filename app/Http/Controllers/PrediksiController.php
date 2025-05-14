<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    public function index()
    {
        return view('pages.data-prediksi.index'); // Mengarahkan ke view data-prediksi
    }
}
