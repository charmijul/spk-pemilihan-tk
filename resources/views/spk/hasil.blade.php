{{-- @dd($nilaikriteria) --}}
@extends('layout.main')

@section('container')
    <header>
        <h1>Halaman SPK Pemilihan TK</h1>
    </header>

    <body>

        <table style="width:100%" cellpadding="4" class="text-center">
            <thead>
                <tr>
                    <th>{{ 'Nama TK' }}</th>
                    <th>{{ 'Hasil perhitugan part 1' }}</th>
                    <th>{{ 'Hasil perhitugan part 2' }}</th>
                    <th>{{ 'Nilai Qi' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datatk as $tk)
                    <tr>
                        <td><a href="/datatk/{{ $tk['name'] }}" class="text-decoration-none"> {{ $tk['name'] }} </a>
                        </td>
                        <td>{{ $tk['hitungpt1'] }}</td>
                        <td>{{ $tk['hitungpt2'] }}</td>
                        <td>{{ $tk['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
@endsection
