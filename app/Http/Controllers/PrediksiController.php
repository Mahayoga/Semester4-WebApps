<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrediksiController extends Controller
{
    public function index() {
        try {
            $apiURL = env('FLASK_API_URL') . '/get/data-histori';
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                $dataHistori = $responsesData['data_histori'];

                return view('pages.admin.data-prediksi.index', compact('dataHistori'));
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {

        }
    }

    public function show($id) {
        try {
            $apiURL = env('FLASK_API_URL') . '/show/data-histori/' . $id;
            $responses = Http::get($apiURL);
            $responsesData = $responses->json();
    
            if($responses->successful() && $responsesData['status'] == 'success') {
                $dataHistori = $responsesData['data_histori'];

                return response()->json([
                    'dataHistori' => $dataHistori
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        } catch(\Exception $e) {

        }
    }
}
