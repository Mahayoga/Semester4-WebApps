<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return view('data-pasien'); // Mengarahkan ke view data-pasien
    }
}
