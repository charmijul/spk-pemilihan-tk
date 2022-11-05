@extends('layout.main')

@section('container')
    <style>
        table,
        th,
        td {
            border: 2px solid black;

        }
    </style>
    <table style="width:100%" cellpadding="4">
        <thead>
            <tr>
                <th>{{ 'Kriteria' }}</th>
                <th>{{ 'Jenis Kriteria' }}</th>
                <th>{{ 'Subkriteria' }}</th>
                <th>{{ 'Nilai Subkriteria' }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subkriteria as $subcriteria)
                <tr>
                    <td>{{ $subcriteria->criteria->name }}</td>
                    <td>{{ $subcriteria->criteria->type }}</td>
                    @if ($subcriteria->x === '' && $subcriteria->y === '')
                        <td>{{ $subcriteria->z }}</td>
                    @endif
                    @if ($subcriteria->z === '' && $subcriteria->y === '')
                        <td>
                            <={{ $subcriteria->x }}</td>
                    @endif
                    @if ($subcriteria->z === '' && $subcriteria->x === '')
                        <td>>={{ $subcriteria->y }}</td>
                    @endif
                    @if ($subcriteria->x !== '' && $subcriteria->y !== '')
                        <td>{{ $subcriteria->x }}-{{ $subcriteria->y }}</td>
                    @endif
                    <td>{{ $subcriteria->subcriteria_point }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
