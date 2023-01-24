@extends('layout.main')

@section('container')
<style>
    .btn{
    text-align: center;
    border-radius: 4px;
    /* color: #F94F4F; */
    background-color: green;
    border: none;
    outline: none;
    }
</style>
    <h2>Nama TK : {{ $datatk['name'] }}</h2>
    @if ($datatk->image)
        <img src="{{ asset('storage/' . $datatk->image) }}">
    @else
        <img src="{{ asset('/storage/tk-images/default-image.png') }}" width="250" height="250">
    @endif
    <article class="mt-10">
        <h5 class="mt-10 mb-10">Kelurahan : <a href="{{ $datatk->link_address }}">{{ $datatk->address }}</a></h5>
        <h5>Biaya SPP : {{ $datatk->spp }}</h5>
        <h5>Biaya Masuk (Rp) : {{ $datatk->entry_fee }}</h5>
        <h5>Batas Tampung perkelas (Rp) : {{ $datatk->capacity }}</h5>
        <h5>Jumlah Pengajar perkelas : {{ $datatk->teachers }}</h5>
        <h5>Akreditasi : {{ $datatk->accreditation }}</h5>
        <h5>Status : {{ $datatk->status }}</h5>
        <h5>Menerima ABK : {{ $datatk->abk }}</h5>
        <h5>Jumlah Fasilitas : {{ $datatk->facilities }}</h5>
    </article>
    {{-- <a href="/datatk">Back to Data TK</a> --}}
    <button class="btn btn-success" onclick="history.go(-1);"> Kembali </button>
@endsection
