<?php

// BMIController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
        ]);

        // Ambil data tinggi dan berat dari request
        $height = $request->input('height');
        $weight = $request->input('weight');

        // Hitung BMI
        $bmi = $weight / (($height / 100) ** 2);

        // Lakukan sesuatu dengan nilai BMI, misalnya simpan ke database atau tampilkan di view
        // ...
        $bmi_category = $this->getBMICategory($bmi);

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with(['bmi' => $bmi, 'bmi_category' => $bmi_category]);
    }
    
    // Fungsi untuk mendapatkan kategori BMI
    private function getBMICategory($bmi)
    {
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            return 'Normal';
        } elseif ($bmi >= 25.0 && $bmi < 29.9) {
            return 'Overweight';
        } elseif ($bmi >= 30.0 && $bmi < 34.9) {
            return 'Obese';
        } else {
            return 'Extremely Obese';
        }
        
    }
}
