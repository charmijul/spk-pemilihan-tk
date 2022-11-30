@extends('dashboard.layouts.main')

@section('container')
    <h2>Nama TK : {{ $infotk['name'] }}</h2>
    @if ($infotk->image)
    <img src="{{ asset('storage/' . $infotk->image) }}">
    @else    
        <img src="{{ asset('storage/tk-images/default-image.png') }}" width="250" height="250">
    @endif
    <article class="mt-10">
        <h5 class="mt-10 mb-10">Kelurahan : <a href="{{ $infotk->link_address }}">{{ $infotk->address }}</a></h5>
        <h5>Biaya SPP : {{ $infotk->spp }}</h5>
        <h5>Biaya Masuk (Rp) : {{ $infotk->entry_fee }}</h5>
        <h5>Batas Tampung perkelas (Rp) : {{ $infotk->capacity }}</h5>
        <h5>Jumlah Pengajar perkelas : {{ $infotk->teachers }}</h5>
        <h5>Akreditasi : {{ $infotk->accreditation }}</h5>
        <h5>Status : {{ $infotk->status }}</h5>
        <h5>Menerima ABK : {{ $infotk->abk }}</h5>
        <h5>Jumlah Fasilitas : {{ $infotk->facilities }}</h5>
    </article>
    <a href="/dashboard/datatk" class="btn btn-success"><span data-feather="arrow-left"></span> Bact to Data TK</a>
    <a href="/dashboard/datatk/{{ $infotk->name }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Ubah</a>
    <form action="/dashboard/datatk/{{ $infotk->name }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Hapus Data?')"><span
                data-feather="x-circle"></span> Hapus</button>
    </form>
@endsection
