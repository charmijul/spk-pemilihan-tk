<?php

namespace App\Http\Controllers;

use App\Matrix;
use App\BobotKriteria;
use App\Models\Datatk;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\App;

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
        $kriteria = collect();
        $matriks = Matrix::matrix_keputusan();
        $bobot_kriteria = BobotKriteria::bobot();
        $databaru = collect();
        $coba = collect();

        for($i = 1; $i !=8; $i++){
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
                //dd($coba);
            }
            $nilai_Qi_pt1 = $total1 * 0.5;
            $nilai_Qi_pt2 = $total2 * 0.5;
            $total = $nilai_Qi_pt1 + $nilai_Qi_pt2;
            $databaru[] = [
                'id' => $matrix['id'],
                'name' => $matrix['name'],
                'hitungpt1' => $nilai_Qi_pt1, 
                'hitungpt2' => $nilai_Qi_pt2,
                'total' => $total 
            ];
        }
        
        $urutanalternatif = collect($databaru->sortByDesc('total'));
        //dd($databaru);
        
        return view('spk.hasil', [
            'title' => 'HASIL SPK',
            'datatk' => $urutanalternatif
        ]);
        // untuk memanggil nama kriteria 
        //dd($kriteria[3]['criteria']);

        //untuk memanggil nilai matirks 1 column
        //dd($matriks[2]['facilities']);
        
    }

    public function miles()
    {
        session_start();
        $jarak = collect($_SESSION['jarak']);
        //dd($jarak);
        return view('spk.cobabaru', [
            'jarak' => $jarak
        ]);
    }
}
