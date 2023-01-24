{{-- @dd($nilaikriteria) --}}
{{-- @dd($_SESSION['jarak']) --}}
@extends('layout.main')

@section('container')
    <header>
        <h3>Urutan Prioritas Kriteria Anda dalam Pemilihan TK</h3>
    </header>

    <body>

        <div class="col-lg-5 mb-5">
            <form method="post" action="/spk/hasil">
                @csrf

                @for ($i = 1; $i < 9; $i++)
                    {{-- form urutan kriteria ke-1 --}}
                    <div class="mb-3">
                        <label for="kriteria_ke_{{ $i }}" class="form-label">Kriteria dengan Urutan Prioritas
                            ke-{{ $i }}</label>
                        <select class="form-select" name="kriteria_ke_{{ $i }}" id="kriteria_ke_{{ $i }}"
                            required value="{{ old('kriteria_ke_' . $i) }}"
                            onchange="getSelectValue(this.value, {{ $i }});" disabled>
                            <option value=""></option>
                            @foreach ($criterias as $criteria)
                                <option value="{{ $criteria->initial }}">{{ $criteria->name }}</option>
                            @endforeach
                            <option value="jarak">Jarak</option>
                        </select>
                        @error('kriteria_ke_{{ $i }}')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endfor

                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </div>

        <table style="width:100%" cellpadding="4" class="text-center mt-5 mb-5">
            <thead>
                <tr>
                    <th>{{ 'Nama TK' }}</th>
                    <th>{{ 'Biaya SPP (Rp)' }}</th>
                    <th>{{ 'Biaya Masuk (Rp)' }}</th>
                    <th>{{ 'Batas Tampung perkelas' }}</th>
                    <th>{{ 'Jumlah Pengajar perkelas' }}</th>
                    <th>{{ 'Akreditasi' }}</th>
                    <th>{{ 'Menerima ABK' }}</th>
                    <th>{{ 'Jumlah Fasilitas' }}</th>
                    <th>{{ 'Nilai Qi' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilaikriteria as $tk)
                    <tr>
                        <td><a href="/datatk/{{ $tk['name'] }}" class="text-decoration-none"> {{ $tk['name'] }} </a>
                        </td>
                        <td>{{ $tk['spp'] }}</td>
                        <td>{{ $tk['entry_fee'] }}</td>
                        <td>{{ $tk['capacity'] }}</td>
                        <td>{{ $tk['teachers'] }}</td>
                        <td>{{ $tk['accreditation'] }}</td>
                        <td>{{ $tk['abk'] }}</td>
                        <td>{{ $tk['facilities'] }}</td>
                        <td>{{ '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    <script>
        window.addEventListener("load", () => {
            document.getElementById('kriteria_ke_1').disabled = false;
        });

        var selectedValueArray = [];

        function getSelectValue(selectedValue, nomor) {
            if (selectedValue != "") {
                var i = nomor + 1;
                var y = nomor - 1;
                document.getElementById('kriteria_ke_'+i).disabled = false;
                if (selectedValueArray[y] != "") {
                    $("#kriteria_ke_" + i + " option[value!='" + selectedValueArray[nomor] + "']").show();
                    selectedValueArray[y] = selectedValue;
                } else {
                    selectedValueArray.push(selectedValue);
                }
                for (let x in selectedValueArray) {
                    $("#kriteria_ke_" + i + " option[value='" + selectedValueArray[x] + "']").hide();
                }
            }
        }
    </script>
@endsection
