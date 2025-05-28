<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuPrediksiController extends Controller
{
      
    public function index()
    {
        return view('pages.admin.menu-prediksi.index'); // Mengarahkan ke view data-prediksi
    }
}
