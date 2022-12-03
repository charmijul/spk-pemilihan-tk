@extends('layout.main')

@section('container')
    <h1>Halaman About</h1>
    <article class="mt-10 mb-10">
        <h3>{{ $name }}</h3>
        <p>{{ $email }}</p>
    </article>
        <img src="img/{{ $image }}" alt=" {{ $name }}" width="200">
@endsection