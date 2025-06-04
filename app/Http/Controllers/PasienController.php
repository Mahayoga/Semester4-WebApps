<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PasienController extends Controller
{

    function getDataPasien() {
        try {
            $apiURL = env('FLASK_API_URL') . '/get/data-pasien';
    
            $responses = Http::get($apiURL);
    
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                $pasienData = $responsesData['data_pasien'];
    
                $hasil = [
                    'status' => 'success',
                    'data_pasien' => $pasienData
                ];
                return response()->json($hasil);
            }
    
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/get/data-pasien';
    
            $responses = Http::get($apiURL);
    
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                $pasienData = $responsesData['data_pasien'];
    
                $hasil = [
                    'status' => 'success',
                    'data_pasien' => $pasienData
                ];
                return view('pages.admin.pasien.index', compact('hasil'));
            }
    
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/create/data-pasien/';
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
            
            if($responses->successful() && $responsesData['status'] == 'success') {
                $userData = $responsesData['data_user'];
                return response()->json([
                    'status' => 'success',
                    'data_user' => $userData
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/add/data-pasien';
    
            $responses = Http::post($apiURL, [
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'tanggal_lahir' => $request->tanggal_lahir,
                'umur' => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'id_user' => $request->id_user,
            ]);
    
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                return response()->json([
                    'status' => 'success'
                ]);
            }
    
            return response()->json([
                'status' => 'error',
                'msg' => $responsesData['msg']
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/show/data-pasien/' . $id;
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
            
            if($responses->successful() && $responsesData['status'] == 'success') {
                $userData = $responsesData['data_pasien'];
                return response()->json([
                    'status' => 'success',
                    'data_pasien' => $userData
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/edit/data-pasien/' . $id;
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
            
            if($responses->successful() && $responsesData['status'] == 'success') {
                $userData = $responsesData['data_pasien'];
                return response()->json([
                    'status' => 'success',
                    'data_pasien' => $userData
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_depan' => ['required'],
                'nama_belakang' => ['required'],
                'tanggal_lahir' => ['required'],
                'umur' => ['required'],
                'gender' => ['required'],
                'alamat' => ['required'],
            ]);
            $apiURL = env('FLASK_API_URL') . '/update/data-pasien/' . $id;
            $responses = Http::post(
                $apiURL,
                [
                    'nama_depan' => $request->nama_depan,
                    'nama_belakang' => $request->nama_belakang,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'umur' => $request->umur,
                    'gender' => $request->gender,
                    'alamat' => $request->alamat,
                ]
            );
            $responsesData = $responses->json();
            
            if($responses->successful() && $responsesData['status'] == 'success') {
                return response()->json([
                    'status' => 'success',
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $apiURL = env('FLASK_API_URL') . '/delete/data-pasien/' . $id;
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
            
            if($responses->successful() && $responsesData['status'] == 'success') {
                return response()->json([
                    'status' => 'success',
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }
}
