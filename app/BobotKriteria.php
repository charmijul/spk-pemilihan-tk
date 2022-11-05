<?php
namespace app;

 class BobotKriteria {
    public static function bobot(){
        //perhitungan bobot menggunakan metode ROC
        $bobot_kriteria1 = (1 + 1 / 2 + 1 / 3 + 1 / 4 + 1 / 5 + 1 / 6 + 1 / 7) / 7;
        $bobot_kriteria2 = (1 / 2 + 1 / 3 + 1 / 4 + 1 / 5 + 1 / 6 + 1 / 7) / 7;
        $bobot_kriteria3 = (1 / 3 + 1 / 4 + 1 / 5 + 1 / 6 + 1 / 7) / 7;
        $bobot_kriteria4 = (1 / 4 + 1 / 5 + 1 / 6 + 1 / 7) / 7;
        $bobot_kriteria5 = (1 / 5 + 1 / 6 + 1 / 7) / 7;
        $bobot_kriteria6 = (1 / 6 + 1 / 7) / 7;
        $bobot_kriteria7 = (1 / 7) / 7;

        $bobot_kriteria = collect();
        $bobot_kriteria = [
            '1' => $bobot_kriteria1,
            '2' => $bobot_kriteria2,
            '3' => $bobot_kriteria3,
            '4' => $bobot_kriteria4,
            '5' => $bobot_kriteria5,
            '6' => $bobot_kriteria6,
            '7' => $bobot_kriteria7
        ];

        return $bobot_kriteria;
    }
 }