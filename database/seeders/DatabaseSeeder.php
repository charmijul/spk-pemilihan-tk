<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Datatk;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
                'username' => 'charmijul',
                'email' => 'charmijul@gmail.com',
                'password' => bcrypt('qwerty123')
        ]);
        
        //isi tabel kriteria
        $isi_kriteria = [
            [
                'name' => 'Biaya SPP (Rp)',
                'initial' => 'spp',
                'type' => 'Cost'
            ],
            [
                'name' => 'Biaya Masuk (Rp)',
                'initial' => 'entry_fee',
                'type' => 'Cost'
            ],
            [
                'name' => 'Batas Tampung perkelas',
                'initial' => 'capacity',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Jumlah Pengajar perkelas',
                'initial' => 'teachers',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Akreditasi',
                'initial' => 'accreditation',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Menerima ABK',
                'initial' => 'abk',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Jumlah Fasilitas',
                'initial' => 'facilities',
                'type' => 'Benefit'
            ]
        ];

        foreach ($isi_kriteria as $kriteria) {
            Kriteria::create($kriteria);
        }

        //isi tabel subkriteria
        $isi_subkriteria = [
            [
                'criteria_id' => 1,
                'x' => '40000',
                'y' => '90000',
                'z' => '',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 1,
                'x' => '91000',
                'y' => '130000',
                'z' => '',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 2,
                'x' => '800000',
                'y' => '1000000',
                'z' => '',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 2,
                'x' => '1001000',
                'y' => '2500000',
                'z' => '',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 3,
                'x' => '10',
                'y' => '',
                'z' => '',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 3,
                'x' => '11',
                'y' => '22',
                'z' => '',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 3,
                'x' => '',
                'y' => '23',
                'z' => '',
                'subcriteria_point' => 3
            ],
            [
                'criteria_id' => 4,
                'x' => '',
                'y' => '',
                'z' => '1',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 4,
                'x' => '',
                'y' => '',
                'z' => '2',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 5,
                'x' => '',
                'y' => '',
                'z' => 'A',
                'subcriteria_point' => 3
            ],
            [
                'criteria_id' => 5,
                'x' => '',
                'y' => '',
                'z' => 'B',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 5,
                'x' => '',
                'y' => '',
                'z' => 'C',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 6,
                'x' => '',
                'y' => '',
                'z' => 'Ya',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 6,
                'x' => '',
                'y' => '',
                'z' => 'Tidak',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 7,
                'x' => '4',
                'y' => '',
                'z' => '',
                'subcriteria_point' => 1
            ],
            [
                'criteria_id' => 7,
                'x' => '5',
                'y' => '8',
                'z' => '',
                'subcriteria_point' => 2
            ],
            [
                'criteria_id' => 7,
                'x' => '',
                'y' => '9',
                'z' => '',
                'subcriteria_point' => 3
            ]
        ];

        foreach ($isi_subkriteria as $subkriteria) {
            Subkriteria::create($subkriteria);
        }
    }
}
