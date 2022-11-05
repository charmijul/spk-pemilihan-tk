<?php

namespace App\Http\Controllers;

use App\Models\Datatk;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<?php
class CobaController extends Controller
{
    //use Input;

    public $long, $lat;
    public $test = "value test";
    public function index()
    {
        $datatk = Datatk::all();
        $lokasi = collect();
        foreach ($datatk as $tk) {
            $lokasi[] = [
                $tk->name,
                [$tk->longtitude, $tk->lattitude]
            ];
        }
        return view('livewire.map-location', [
            'title' => 'Map',
            'lokasi' => $lokasi
        ]);
        //dd($request);
    }

    public function miles()
    {
        session_start();
        $_SESSION['php_value'] = $_REQUEST['val'];
        $data = $_SESSION['php_value'];
        //$data = $_POST['cars'];
        //$data = json_decode(stripslashes($_POST['data']));
        dd($data);
    }

    public static function coba($data)
    {
        dd($data);
        //return($data);
    }
}
?>