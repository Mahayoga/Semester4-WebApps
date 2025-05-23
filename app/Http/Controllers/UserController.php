<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.admin.data-user.index'); // Mengarahkan ke view data-pasien
    }
}
