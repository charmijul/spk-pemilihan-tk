@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data TK</h1>
</div>
<div class="col-lg-5">
    <form method="post" action="/dashboard/datatk/{{ $infotk->name }}" enctype="multipart/form-data">
      @method('put')  
      @csrf

    {{-- form name --}}
    <div class="mb-3">
            <label for="name" class="form-label">Nama TK</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            required autofocus value="{{ old('name', $infotk->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>
    {{-- form address --}}
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
      required value="{{ old('address', $infotk->address) }}">
      @error('address')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- koordinat lokasi --}}
    <div class="card">
      <div class="card-header bg-dark text-white">
          Titik Kordinat
      </div>
      <div class="card-body">
          <div id='map' style="width: 100%; height: 75vh;" name="map"></div>
      </div>
  </div>
  <div class="card">
      <div class="card-body">
          <div class="row">
              <div class="col-sm-6">
                  <label for="longtitude" class="form-label">Longtitude</label>
                  <input type="text" class="form-control" @error('longtitude') is-invalid @enderror
                      id="longtitude" name="longtitude" readonly required value="{{ old('longtitude', $infotk->longtitude) }}">
                  @error('longtitude')
                      <div class="invalid-feedback">
                          {{ 'Harap Memasukkan Titik Koordinat Lokasi TK' }}
                      </div>
                  @enderror
              </div>
              <div class="col-sm-6">
                  <label for="lattitude" class="form-label">Lattitude</label>
                  <input type="text" class="form-control" @error('lattitude') is-invalid @enderror
                      id="lattitude" name="lattitude" readonly required value="{{ old('lattitude', $infotk->lattitude) }}">
                  @error('lattitude')
                      <div class="invalid-feedback">
                          {{ 'Harap Memasukkan Titik Koordinat Lokasi TK' }}
                      </div>
                  @enderror
              </div>
          </div>
      </div>
  </div>
  {{-- form link-address --}}
  <div class="mb-3">
      <label for="link_address" class="form-label">Link Google Map (Optional)</label>
      <input type="text" class="form-control @error('link_address') is-invalid @enderror" name="link_address"
          id="link_address" value="{{ old('link_address', $infotk->link_address) }}">
          @error('spp')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
  </div>
    {{-- form spp --}}
    <div class="mb-3">
      <label for="spp" class="form-label">Biaya SPP perbulan (Rp)</label>
      <input type="text" class="form-control @error('spp') is-invalid @enderror" name="spp" id="spp"
      required value="{{ old('spp', $infotk->spp) }}">
      @error('spp')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form entry_fee --}}
    <div class="mb-3">
        <label for="entry_fee" class="form-label">Biaya Masuk (Rp)</label>
        <input type="text" class="form-control @error('entry_fee') is-invalid @enderror" name="entry_fee" id="entry_fee"
        required value="{{ old('entry_fee', $infotk->entry_fee) }}">
      @error('entry_fee')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form capacity --}}
    <div class="mb-3">
      <label for="capacity" class="form-label">Batas Tampung Kelas</label>
      <input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity" id="capacity"
      required value="{{ old('capacity', $infotk->capacity) }}">
      @error('capacity')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form teachers --}}
    <div class="mb-3">
      <label for="teachers" class="form-label">Jumlah Guru perkelas</label>
      <input type="text" class="form-control @error('teachers') is-invalid @enderror" name="teachers" id="teachers"
      required value="{{ old('teachers', $infotk->teachers) }}">
      @error('teachers')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form accreditation --}}
    <div class="mb-3">
      <label for="accreditation" class="form-label">Akreditasi</label>
      <select class="form-select" name="accreditation" id="accreditation" required value="{{ old('accreditation', $infotk->accreditation) }}">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
      @error('accreditation')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form status --}}
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" id="status" required value="{{ old('status', $infotk->status) }}">
        <option value="Negeri">Negeri</option>
        <option value="Swasta">Swasta</option>
      </select>
      @error('status')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form abk --}}
    <div class="mb-3">
      <label for="abk" class="form-label">Menerima Anak Berkebutuhan Khusus</label>
      <select class="form-select" name="abk" id="abk" required value="{{ old('abk') }}">
        <option value="Ya">Ya</option>
        <option value="Tidak">Tidak</option>
      </select>
      @error('abk')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form facilities --}}
    <div class="mb-3">
      <label for="facilities" class="form-label">Jumlah Fasilitas</label>
      <input type="text" class="form-control @error('facilities') is-invalid @enderror" name="facilities" id="facilities"
      required value="{{ old('facilities', $infotk->facilities) }}">
      @error('facilities')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form image --}}
    <div class="mb-3">
      <label for="image" class="form-label">Foto TK</label>
      <input type="hidden" name="oldImage" value="{{ $infotk->image }}">
      @if ($infotk->image)
          <img src="{{ asset('storage/' . $infotk->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else    
      <img class="img-preview img-fluid mb-3 col-sm-5">
      @endif
      <input class="form-control" type="file" @error('image') is-invalid @enderror id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Data TK</button>
  </form>
</div>

<script>
  window.addEventListener("load", () => {
            const defaultLocation = [117.06848892497732, -0.609395564393381]
            const oldLong = @json($infotk->longtitude);
            const oldLat = @json($infotk->lattitude);
            const oldLocation = [oldLong,oldLat];
            mapboxgl.accessToken = '{{ ENV('MAPBOX_KEY') }}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: defaultLocation,
                zoom: 13.50
            });
            const style = "streets-v11"
            //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
            map.setStyle(`mapbox://styles/mapbox/${style}`)
            map.addControl(new mapboxgl.NavigationControl())

            var purpleMarker = new mapboxgl.Marker({
                color: 'purple'
            });
            purpleMarker.setLngLat(oldLocation) // marker position using variable 'from'
                    .addTo(map);
            map.on('click', (e) => {

                const long = document.querySelector('#longtitude');
                const lat = document.querySelector('#lattitude');
                const longtitude = e.lngLat.lng;
                const lattitude = e.lngLat.lat;
                var from = [longtitude, lattitude]
                purpleMarker.remove();
                purpleMarker.setLngLat(from) // marker position using variable 'from'
                    .addTo(map); //add marker to map
                long.value = longtitude;
                lat.value = lattitude;
            });
        });

  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection