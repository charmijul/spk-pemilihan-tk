<?php

namespace app;

use App\Models\Datatk;
use App\Models\Kriteria;

class Matrix
{
    public static function matrix_keputusan()
    {
        session_start();
        $jarak = $_SESSION['jarak'];
        $datatk = Datatk::all();
        //$kriteria = Kriteria::all();

        $matrix_keputusan = collect();
        $matrix_keputusan_ternormalisasi = collect();

        //membuat matrix keputusan
        foreach ($datatk as $tk) {
            //nilai point untuk spp
            if ($tk->spp >= 40000 && $tk->spp <= 90000) {
                $spppoint = 1;
            } elseif ($tk->spp >= 91000 && $tk->spp <= 130000) {
                $spppoint  = 2;
            }
            //nilai point untuk entry_fee
            if ($tk->entry_fee >= 800000 && $tk->entry_fee <= 1000000) {
                $entry_feepoint = 1;
            } elseif ($tk->entry_fee >= 1001000 && $tk->entry_fee <= 2500000) {
                $entry_feepoint  = 2;
            }
            //nilai point untuk capacity
            if ($tk->capacity <= 10) {
                $capacitypoint = 1;
            } elseif ($tk->capacity >= 11 && $tk->capacity <= 22) {
                $capacitypoint  = 2;
            } elseif ($tk->capacity >= 23) {
                $capacitypoint  = 3;
            }
            //nilai point untuk teachers
            if ($tk->teachers == 1) {
                $teacherspoint = 1;
            } elseif ($tk->teachers == 2) {
                $teacherspoint  = 2;
            }
            //nilai point untuk accreditation
            if ($tk->accreditation == 'A') {
                $accreditationpoint = 3;
            } elseif ($tk->accreditation == 'B') {
                $accreditationpoint  = 2;
            } elseif ($tk->accreditation == 'C') {
                $accreditationpoint  = 1;
            }
            //nilai point untuk abk
            if ($tk->abk == 'Ya') {
                $abkpoint = 2;
            } elseif ($tk->abk == 'Tidak') {
                $abkpoint  = 1;
            }
            //nilai point untuk facilities
            if ($tk->facilities <= 4) {
                $facilitiespoint = 1;
            } elseif ($tk->facilities >= 5 && $tk->facilities <= 8) {
                $facilitiespoint  = 2;
            } elseif ($tk->facilities >= 9) {
                $facilitiespoint  = 3;
            }

            //nilai untuk jarak
            if($jarak[$tk->id - 1] <= 3){
                $distancepoint = 1;
            } elseif($jarak[$tk->id - 1] > 3 && $jarak[$tk->id - 1] <= 7){
                $distancepoint = 2;
            } elseif($jarak[$tk->id - 1] > 7){
                $distancepoint = 3;
            }

            $matrix_keputusan[] = [
                'id' => $tk->id,
                'name' => $tk->name,
                'spp' => $spppoint,
                'entry_fee' => $entry_feepoint,
                'capacity' => $capacitypoint,
                'teachers' => $teacherspoint,
                'accreditation' => $accreditationpoint,
                'abk' => $abkpoint,
                'facilities' => $facilitiespoint,
                'jarak' => $distancepoint
            ];
        }

        $minspp = $matrix_keputusan->min('spp');
        $minentry_fee = $matrix_keputusan->min('entry_fee');
        $maxcapacity = $matrix_keputusan->max('capacity');
        $maxteachers = $matrix_keputusan->max('teachers');
        $maxaccreditation = $matrix_keputusan->max('accreditation');
        $maxabk = $matrix_keputusan->max('abk');
        $maxfacilities = $matrix_keputusan->max('facilities');
        $minjarak = $matrix_keputusan->min('jarak');

        //normalisasi matrix keputusan
        foreach ($matrix_keputusan as $mt) {
            $spppoint = $minspp / $mt['spp'];
            $entry_feepoint = $minentry_fee / $mt['entry_fee'];
            $capacitypoint = $mt['capacity'] / $maxcapacity;
            $teacherspoint = $mt['teachers'] / $maxteachers;
            $accreditationpoint = $mt['accreditation'] / $maxaccreditation;
            $abkpoint = $mt['abk'] / $maxabk;
            $facilitiespoint = $mt['facilities'] / $maxfacilities;
            $jarakpoint = $minjarak / $mt['jarak'];

            $matrix_keputusan_ternormalisasi[] = [
                'id' => $mt['id'],
                'name' => $mt['name'],
                'spp' => $spppoint,
                'entry_fee' => $entry_feepoint,
                'capacity' => $capacitypoint,
                'teachers' => $teacherspoint,
                'accreditation' => $accreditationpoint,
                'abk' => $abkpoint,
                'facilities' => $facilitiespoint,
                'jarak' => $jarakpoint
            ];
        }

        return $matrix_keputusan_ternormalisasi;
    }
}
