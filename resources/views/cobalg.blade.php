<?php
use App\Http\Controllers\CobaController;
?>
<div>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const p1 = new Array("success", "send", "an", "array", "variable");
        var i = 0;
        const cars = [];
        cars[0] = "Saab";
        cars[1] = "Volvo";
        cars[2] = "BMW";
        //document.cookie="profile_viewer_uid=1";
        //document.cookie= cars ;
        //console.log(p1);
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     type: "POST",
        //     url: "/getMiles",
        //     data: {
        //         cars: JSON.stringify(cars)
        //     },
        //     success: function(data) {
        //         console.log(data);
        //     },
        //     error: function(data, textStatus, errorThrown) {
        //         console.log(data);

        //     }
        // });
    </script>
</div>
<?php
$lagi = '<script>document.write(p1)</script>';
$coba = collect();
for ($i=0; $i < 3; $i++) { 
    $coba[]= ['<script>document.write(cars[i]);var i = i + 1;</script>'];
}
//$lagi = [$coba[0][0],$coba[1][0],$coba[2][0]];
//$koleksi = $_COOKIE['profile_viewer_uid'];
//$koleksi = $_COOKIE['cars'];
//$koleksi = json_decode(stripslashes($coba));
//$lagi = explode(" , ",$coba);
//dd($coba);
//echo var_dump($coba[0][0]);
//echo var_dump($koleksi);
//CobaController::coba($lagi);
//echo $lagi;
?>
