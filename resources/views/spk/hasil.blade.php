{{-- @dd($_SESSION['rekomendasitk']) --}}
@extends('layout.main')

@section('container')
    <header>
        <h1>Urutan Rekomendasi TK</h1>
    </header>
    {{-- <a href="http://127.0.0.1:8000/spk/cetak-pdf"><button class="bg-success text-white fs-4 mb-3">Cetak</button></a> --}}
    <body style="align-items: center">
        <table style="width:75%" cellpadding="4" class="text-center mt-3 mb-5">
            <thead>
                <tr>
                    <th>{{ 'No' }}</th>
                    <th>{{ 'Nama TK' }}</th>
                    {{-- <th>{{ 'Jarak' }}</th> --}}
                    {{-- <th>{{ 'Hasil perhitugan part 1' }}</th> --}}
                    {{-- <th>{{ 'Hasil perhitugan part 2' }}</th> --}}
                    <th>{{ 'Nilai Qi' }}</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($_SESSION['jarak'] as $jarak)
                <tr>
                    <td>{{ $jarak }}</td>
                </tr>
                @endforeach --}}
                @foreach ($datatk as $tk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="/datatk/{{ $tk['name'] }}" class="text-decoration-none"> {{ $tk['name'] }} </a>
                        </td>
                        {{-- <td>{{ Str::limit($tk['jarak'], 6, '') }} Km</td> --}}
                        {{-- <td>{{ $tk['hitungpt1'] }}</td> --}}
                        {{-- <td>{{ $tk['hitungpt2'] }}</td> --}}
                        <td>{{ Str::limit($tk['total'], 6, '') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
@endsection
