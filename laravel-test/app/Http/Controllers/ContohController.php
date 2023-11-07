<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    //
    public function testUnitTesting(){
        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'data' => [
                'nama' => 'Aku',
                'umur' => 66
            ]
        ]);
    }
    
}
