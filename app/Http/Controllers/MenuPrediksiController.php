<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuPrediksiController extends Controller
{
    /**
     * Menampilkan halaman form prediksi diabetes
     */
    public function index()
    {
        // Mengarahkan ke file resources/views/pages/admin/menu-prediksi/index.blade.php
        return view('pages.admin.menu-prediksi.index');
    }
}
