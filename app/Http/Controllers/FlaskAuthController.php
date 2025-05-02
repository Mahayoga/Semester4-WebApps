<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.login.index');
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
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8']
            ]);
    
            $apiURL = env('FLASK_API_URL') . '/login';
    
            $responses = Http::post($apiURL, [
                'email' => $request->email,
                'password' => $request->password
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
    public function destroy()
    {
        session()->flush();
        return redirect()->route('login.index');
    }
}
