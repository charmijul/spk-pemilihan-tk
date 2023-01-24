@extends('layout.main')

@section('container')
<link rel="stylesheet" href="/css/home.css">
{{-- </style> --}}
<div class="card mb-3">
    <img src="img/logo-spk-cropped.png" class="mt-3" width="150" height="150">
    <div class="card-body text-center">
      <p class="card-title">Sistem Pendukung Keputusan Pemilihan <br> Taman Kanak-Kanak</p>
      <p class="card-text">Website yang berfungsi untuk membantu para orang tua dalam memilih TK untuk anak mereka, sistem ini akan memberikan rekomendasi TK berdasarkan kriteria pilihan para orang tua</p>
      <a href="/map"><button class="btn-start fs-4">Mulai</button></a>
      <a href="/panduan"><button class="btn-guide fs-4">Panduan</button></a>
    </div>
  </div>

@endsection