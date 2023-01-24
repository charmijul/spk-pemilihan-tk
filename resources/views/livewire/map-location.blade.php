<div>
    <h1>Titik Koordinat Lokasi Anda:</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .card-header{
            background-image: linear-gradient(to top right, #0AA804, #b3db22);
        }
    </style>
    {{-- mapbox api --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white">
                        MapBox
                    </div>
                    <div class="card-body">
                        <div wire:ignore id='map' style="width: 100%; height: 75vh;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white">
                        Titik Kordinat
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input wire:model="long" type="text" class="form-control" disabled readonly
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Lattitude</label>
                                        <input wire:model="lat" type="text" class="form-control" id="lat-span"
                                            disabled readonly required>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark text-white btn-block" id="submit">Submit
                                        Location</button>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                        <button class="btn btn-success text-white btn-block mt-3" wire:click="miles">Submit
                            Location</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var jarak = [];
        document.addEventListener('livewire:load', () => {
            const defaultLocation = [117.06848892497732, -0.609395564393381]
            console.log('ini adalah value awal jarak: ', @this.jarak);

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
                var localename = element[0];

                var popup = new mapboxgl.Popup()
                    .setText(localename)
                    .addTo(map);

                var redMarker = new mapboxgl.Marker({
                        color: 'red'
                    })
                    .setLngLat(locate) // marker position using variable 'to'
                    .addTo(map)
                    .setPopup(popup); //add marker to map
            });

            var options = {
                units: 'kilometers'
            }; // units can be degrees, radians, miles, or kilometers, just be sure to change the units in the text box to match. 
            var greenMarker = new mapboxgl.Marker({
                color: 'green'
            });
            map.on('click', (e) => {
                const longtitude = e.lngLat.lng
                const lattitude = e.lngLat.lat
                if (jarak != []) {
                    var jarak = [];
                }

                greenMarker.remove();
                var from = [longtitude, lattitude]

                var cobajarak = turf.distance(defaultLocation, from, options);
                console.log("jarak dari pusat peta", cobajarak);
                if (cobajarak > 10) {
                    alert(
                        "mohon maaf untuk saat ini sistem tidak mendukung untuk wilayah anda, untuk saat ini sistem hanya mendukung untuk wilayah Kec.Loa Janan"
                    );
                    @this.long = null;
                    @this.lat = null;
                } else {
                    @this.long = longtitude;
                    @this.lat = lattitude;
                    greenMarker.setLngLat(from) // marker position using variable 'from'
                        .addTo(map); //add marker to map

                    var lokasi = @json($lokasi);
                    lokasi.forEach(element => {
                        var locate = element[1];
                        var distance = turf.distance(locate, from, options);
                        jarak.push(distance);
                    });

                    @this.jarak = jarak;
                    console.log(from);
                }
            });

        });
        //onclick cara ke-1
        // document.getElementById("tampiljarak").onclick = function() {
        //         @this.jarak = jarak;
        //         var arrayjarak = @this.jarak;
        //         sessionStorage.setItem('jarak', arrayjarak);
        //         @this.miles();
        //         window.location.href="baru";
        //         console.log('ini adalah value baru jarak : ', sessionStorage.getItem('jarak'));
        // };
    </script>
@endpush

<?php
$coba = 'value baru';
$this->test = $coba;
// echo $this->test;
?>
