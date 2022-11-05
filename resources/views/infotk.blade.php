@extends('layout.main')

@section('container')
        <h2>Nama TK : {{ $datatk['name'] }}</h2>
        <img src="http://source.unsplash.com/250x250?playground" width="250" height="250">
        <article class="mt-10">
        <h5 class="mt-10 mb-10" >Kelurahan  : {{ $datatk->address }}</h5>
        <h5>Biaya SPP  : {{ $datatk->spp }}</h5>
        <h5>Biaya Masuk (Rp) : {{ $datatk->entry_fee}}</h5>
        <h5>Batas Tampung perkelas (Rp) : {{ $datatk->capacity }}</h5>
        <h5>Jumlah Pengajar perkelas  : {{ $datatk->teachers }}</h5>
        <h5>Akreditasi  : {{ $datatk->accreditation }}</h5>
        <h5>Status  : {{ $datatk->status }}</h5>
        <h5>Menerima ABK  : {{ $datatk->abk }}</h5>
        <h5>Jumlah Fasilitas  : {{ $datatk->facilities }}</h5>
        </article>
    <a href="/datatk">Bact to Data TK</a>
@endsection