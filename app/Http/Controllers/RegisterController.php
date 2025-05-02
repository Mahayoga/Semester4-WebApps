<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.register.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_depan' => ['required', 'string'],
                'nama_belakang' => ['required', 'string'],
                'email' => ['required', 'email'],
                'password' => ['required', 'string'],
            ]);

            $apiURL = env('FLASK_API_URL') . '/register';

            $responses = Http::post($apiURL, [
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'user',
            ]);

            $responsesData = $responses->json();

            if($responses->successful() && $responsesData['status'] == 'success') {
                $userData = $responsesData['data_user'];
    
                session([
                    'id_user' => $userData['id_user'],
                    'nama_depan' => $userData['nama_depan'],
                    'nama_belakang' => $userData['nama_belakang'],
                    'role' => $userData['role'],
                    'email' => $userData['email'],
                    'logged_in' => true
                ]);
    
                return response()->json([
                    'status' => 'success',
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
