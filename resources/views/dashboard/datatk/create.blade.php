@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data TK baru</h1>
</div>
<div class="col-lg-5">
    <form method="post" action="/dashboard/datatk">
        @csrf

    {{-- form name --}}
    <div class="mb-3">
            <label for="name" class="form-label">Nama TK</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            required autofocus value="{{ old('name') }}">
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
      required value="{{ old('address') }}">
      @error('address')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form spp --}}
    <div class="mb-3">
      <label for="spp" class="form-label">Biaya SPP perbulan (Rp)</label>
      <input type="text" class="form-control @error('spp') is-invalid @enderror" name="spp" id="spp"
      required value="{{ old('spp') }}">
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
        required value="{{ old('entry_fee') }}">
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
      required value="{{ old('capacity') }}">
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
      required value="{{ old('teachers') }}">
      @error('teachers')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>
    {{-- form accreditation --}}
    <div class="mb-3">
      <label for="accreditation" class="form-label">Akreditasi</label>
      <select class="form-select" name="accreditation" id="accreditation" required value="{{ old('accreditation') }}">
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
      <select class="form-select" name="status" id="status" required value="{{ old('status') }}">
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
      required value="{{ old('facilities') }}">
      @error('facilities')
          <div class="invalid-feedback">
                {{ $message }}
          </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambahkan Data TK</button>
  </form>
</div>
@endsection