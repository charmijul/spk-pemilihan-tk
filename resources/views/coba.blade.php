{{-- @dd($lokasi) --}}
@extends('layout.main')

@section('container')

    <head>
        <h1>INI ADALAH HALAMAN MAP</h1>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        {{-- mapbox api --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            MapBox
                        </div>
                        <div class="card-body">
                            <div id='map' style="width: 100%; height: 75vh;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Titik Kordinat
                        </div>
                        <div class="card-body">
                            <form method="post" action="/getMiles" id="insertForm">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Longtitude</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Lattitude</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark text-white btn-block" id="submit">Submit
                                        Location</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    @push('script')
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js">
        //document.addEventListener('click', () => {
        //window.onload = () => {
        const defaultLocation = [117.06848892497732, -0.609395564393381]
        var jarak = [];
        console.log(jarak);

        mapboxgl.accessToken = '{{ ENV('MAPBOX_KEY') }}';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 13.50
            //style: 'mapbox://styles/mapbox/streets-v11'
        });
        const style = "streets-v11"
        //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
        map.setStyle(`mapbox://styles/mapbox/${style}`)
        map.addControl(new mapboxgl.NavigationControl())

        var lokasi = @json($lokasi);
        lokasi.forEach(element => {
            var locate = element[1];
            var greenMarker = new mapboxgl.Marker({
                    color: 'green'
                })
                .setLngLat(locate) // marker position using variable 'to'
                .addTo(map); //add marker to map
        });

        var options = {
            units: 'kilometers'
        }; // units can be degrees, radians, miles, or kilometers, just be sure to change the units in the text box to match. 
        var purpleMarker = new mapboxgl.Marker({
            color: 'purple'
        });
        map.on('click', (e) => {
            const longtitude = e.lngLat.lng
            const lattitude = e.lngLat.lat
            if (jarak != []) {
                var jarak = [];
            }
            purpleMarker.remove();
            var from = [longtitude, lattitude]

            purpleMarker.setLngLat(from) // marker position using variable 'from'
                .addTo(map); //add marker to map

            var lokasi = @json($lokasi);
            lokasi.forEach(element => {
                var name = element[0];
                var locate = element[1];
                var distance = turf.distance(locate, from, options);
                jarak.push([name, distance]);
            });


            console.log({
                from,
                jarak
            });

            var jsonString = JSON.stringify(jarak);
            console.log(jsonString);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $.ajax({
                type: "POST",
                url: "/getMiles",
                data: {
                    data: {jarak : JSON.stringify( jarak )};
                },
                success: function(res) {
                    console.log(res);
                }
            });
            //console.log({longtitude, lattitude});
        });

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $('#insertForm').on('submit', function(e) {
        //     e.preventDefault();
        //     var data = jarak;
        //     var url = $(this).attr('action');
        //     var post = $(this).attr('method');

        //     $.ajax({
        //         type: post,
        //         url: url,
        //         data: data,
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data)
        //         }
        //     })
        // })
        const buton = document.querySelector('.btn');
        buton.addEventListener('click', function() {
            var jsonString = JSON.stringify(jarak);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $.ajax({
                type: "POST",
                url: "/getMiles",
                data: {
                    data: jsonString
                    //_token: '{{ csrf_token() }}'
                },
                //cache: false,

                success: function(res) {
                    console.log(res);
                    //CobaController::miles(jarak);
                    //alert("ok");
                }
            });
        });

        //};
        //});
    </script>
    <?php
    echo '<script>document.writeln(jarak);</script>';
    ?>
@endsection
