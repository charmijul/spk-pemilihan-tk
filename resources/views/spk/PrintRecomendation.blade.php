<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        .card {
            align-items: center;
            justify-items: center;
            background-image: linear-gradient(to bottom right, #0AA804, #F3FF1E);
        }

        .card-title {
            color: goldenrod;
            font-size: 50px;
            font-weight: bold;
            -webkit-text-stroke: 1px green;
        }

        img{
            align-items: center;
            justify-content: center
        }
        p {
            color: green;
        }

        table,
        th,
        td {
            border: 2px solid black;

        }
    </style>
</head>

<body>
    <div class="card mb-3">
        <center><img src="http://127.0.0.1:8000/img/logo-spk-cropped.png" class="mt-3" width="150" height="150"></center>
        <div class="card-body text-center mb-10">
            <center><p class="card-title">Urutan Rekomendasi TK</p></center>
            <center><table style="width:75%" cellpadding="4" class="text-center mt-3 mb-5">
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
                    {{-- @foreach ($_SESSION['jarak'] as $jarak)
                <tr>
                    <td>{{ $jarak }}</td>
                </tr>
                @endforeach --}}
                    @foreach ($datatk as $tk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="/datatk/{{ $tk['name'] }}" class="text-decoration-none"> {{ $tk['name'] }}
                                </a>
                            </td>
                            {{-- <td>{{ Str::limit($tk['jarak'], 6, '') }} Km</td> --}}
                            {{-- <td>{{ $tk['hitungpt1'] }}</td> --}}
                            {{-- <td>{{ $tk['hitungpt2'] }}</td> --}}
                            <td>{{ Str::limit($tk['total'], 6, '') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </center>
        </div>
    </div>
</body>

</html>
