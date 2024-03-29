<?php

namespace App\Http\Controllers;

use App\Matrix;
use App\BobotKriteria;
use App\Models\Datatk;
use App\Models\Kriteria;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\App;
// use Illuminate\Support\Facades\PDF;

class SpkController extends Controller
{

    public function index()
    {
        $datatk = Datatk::all();
        $kriteria = Kriteria::all();
        $matrix = Matrix::matrix_keputusan();

        return view('spk.index', [
            "title" => "SPK Pemilihan TK",
            "datatk" => $datatk,
            'criterias' => $kriteria,
            'nilaikriteria' => $matrix
        ]);
    }

    public function spk(Request $request)
    {
        // if($_SESSION['rekomendasitk']){
        //     $urutanalternatif = $_SESSION['rekomendasitk'];

        // return view('spk.hasil', [
        //     'title' => 'HASIL SPK',
        //     'datatk' => $urutanalternatif
        // ]);
        // }
        // else{
        // dd($request);
        $validatedRequest = $request->validate([
            "kriteria_ke_1" => "required",
            "kriteria_ke_2" => "required",
            "kriteria_ke_3" => "required",
            "kriteria_ke_4" => "required",
            "kriteria_ke_5" => "required",
            "kriteria_ke_6" => "required",
            "kriteria_ke_7" => "required",
            "kriteria_ke_8" => "required"
        ]);
        $kriteria = collect();
        $matriks =Matrix::matrix_keputusan();
        $bobot_kriteria = BobotKriteria::bobot();
        $databaru = collect();
        $coba = collect();

        for($i = 1; $i !=9; $i++){
            $urutan = 'kriteria_ke_';
            $urutan .= $i;
            $kriteria[] = [
                'criteria' => $request->$urutan,
                'weight' =>$bobot_kriteria[$i]
            ];
        }

        //perhitungan nilai preferensi Qi alternatif menggunakan metode WASPAS
        foreach($matriks as $matrix){
            $total1 = 0;
            $total2 = 1.0;
            foreach($kriteria as $criteria){
                $name = $criteria['criteria'];
                $hitungpt1 = $matrix[$name] * $criteria['weight'];
                $hitungpt2 = $matrix[$name] ** $criteria['weight'];
                $total1 += $hitungpt1;
                $total2 *= $hitungpt2;
                $coba[] = [
                    'name' => $name,
                    'nilai' => $hitungpt2,
                    'total' => $total2
                ];
            }
            //dd($kriteria);
            $nilai_Qi_pt1 = $total1 * 0.5;
            $nilai_Qi_pt2 = $total2 * 0.5;
            $total = $nilai_Qi_pt1 + $nilai_Qi_pt2;
            $jarak = $_SESSION['jarak'];
            $databaru[] = [
                'id' => $matrix['id'],
                'name' => $matrix['name'],
                'hitungpt1' => $nilai_Qi_pt1, 
                'hitungpt2' => $nilai_Qi_pt2,
                'total' => $total,
                'jarak' => $matrix['jarak']
                // 'jarak' => $jarak[$matrix['id'] - 1]
            ];
        }
        
        $urutanalternatif = collect($databaru->sortByDesc('total'));
        
        // $urutanalternatif = collect($databaru);
        //dd($databaru);
        
        // $_SESSION['rekomendasitk'] = $urutanalternatif;

        return view('spk.hasil', [
            'title' => 'HASIL SPK',
            'datatk' => $urutanalternatif
        ]);
        // untuk memanggil nama kriteria 
        //dd($kriteria[3]['criteria']);

        //untuk memanggil nilai matirks 1 column
        //dd($matriks[2]['facilities']);
    // }
        
    }

    public function downloadpdf(){
        session_start();
        $rekomendasitk = $_SESSION['rekomendasitk'];
        $pdf = PDF::loadview('spk.PrintRecomendation', [
            'title' => 'HASIL SPK',
            'datatk' => $rekomendasitk
        ]);
        return $pdf->download('rekomendasi TK.pdf');
    }
}
