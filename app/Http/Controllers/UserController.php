<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    public function getData() {
        try {
            $apiURL = env('FLASK_API_URL') . '/get/data-user/all/data';
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

    public function index() {
        try {
            $apiURL = env('FLASK_API_URL') . '/get/data-user';
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                $pasienData = $responsesData['data_user'];
                $hasil = [
                    'status' => 'success',
                    'data_user' => $pasienData
                ];
                return view('pages.admin.data-user.index', compact('hasil'));
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {
            dd($e);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'role' => ['required'],
                'username' => ['required'],
                'password' => ['required']
            ]);
            $apiURL = env('FLASK_API_URL') . '/add/data-user';
            $responses = Http::post(
                $apiURL,
                [
                    'email' => $request->email,
                    'role' => $request->role,
                    'username' => $request->username,
                    'password' => $request->password
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

    public function show($id) {
        try {
            $apiURL = env('FLASK_API_URL') . '/show/data-user/' . $id;
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

    public function edit($id) {
        try {
            $apiURL = env('FLASK_API_URL') . '/edit/data-user/' . $id;
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

    public function update(Request $request, $id) {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'role' => ['required'],
                'username' => ['required']
            ]);
            $apiURL = env('FLASK_API_URL') . '/update/data-user/' . $id;
            $responses = Http::post(
                $apiURL,
                [
                    'email' => $request->email,
                    'role' => $request->role,
                    'username' => $request->username,
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

    public function destroy($id) {
        try {
            $apiURL = env('FLASK_API_URL') . '/delete/data-user/' . $id;
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
