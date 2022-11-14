<?php

namespace App\Http\Livewire;

use App\Models\Datatk;
use Livewire\Component;

class MapLocation extends Component
{
    public $long, $lat;
    public $title = 'map';
    public $jarak = array();
    public $test = 'value test';
    
    public function tampilJarak($jarak){
        $this->jarak = $jarak;
        return view('tampilJarak', [
            'jarak' => $this->jarak
        ]);
    }

    public function render()
    {
        $datatk = Datatk::all();
        $lokasi = collect();
        foreach ($datatk as $tk) {
            $lokasi[] = [
                $tk->name,
                [$tk->longtitude, $tk->lattitude]
            ];
        }
        //return View::make('pages.index', array('title' => 'Title'));
        return view('livewire.map-location', array(
            'title' => $this->title,
            'lokasi' => $lokasi
        ));
    }

    public function miles()
    {
        session_start();
        $_SESSION['jarak'] = $this->jarak;
        return redirect()->to('/getMiles');
    }
}
