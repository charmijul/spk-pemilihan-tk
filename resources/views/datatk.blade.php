@extends('layout.main')

@section('container')

            <form action="/datatk" class="col-md-12">
                <div class="row">
                    <label for="category">Cari Berdasarkan:</label>
                    <div class="input-group mb-3">
                        <select class="form-select md-3" name="category">
                            @if (request('category')=='name')
                            <option value="name">Nama TK</option>
                            <option value="address">Kelurahan</option>
                            @elseif (request('category')=='address')
                            <option value="address">Kelurahan</option>
                            <option value="name">Nama TK</option>
                            @else
                            <option value="name">Nama TK</option>
                            <option value="address">Kelurahan</option>
                            @endif
                        </select>
                        <input type="text" class="form-control md-6" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </div>
            </form>

    @if ($datatk->count())
        <table style="width:100%" cellpadding="4" class="text-center">
            <thead>
                <tr>
                    <th>{{ 'Nama TK' }}</th>
                    <th>{{ 'Lokasi' }}</th>
                    <th>{{ 'Biaya SPP (Rp)' }}</th>
                    <th>{{ 'Biaya Masuk (Rp)' }}</th>
                    <th>{{ 'Batas Tampung perkelas' }}</th>
                    <th>{{ 'Jumlah Pengajar perkelas' }}</th>
                    <th>{{ 'Akreditasi' }}</th>
                    <th>{{ 'Status' }}</th>
                    <th>{{ 'Menerima ABK' }}</th>
                    <th>{{ 'Jumlah Fasilitas' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datatk as $tk)
                    <tr>
                        <td><a href="/datatk/{{ $tk->name }}" class="text-decoration-none"> {{ $tk->name }} </a>
                        </td>
                        <td><a href="{{ $tk->link_address }}">{{ $tk->address }}</a></td>
                        <td>{{ $tk->spp }}</td>
                        <td>{{ $tk->entry_fee }}</td>
                        <td>{{ $tk->capacity }}</td>
                        <td>{{ $tk->teachers }}</td>
                        <td>{{ $tk->accreditation }}</td>
                        <td>{{ $tk->status }}</td>
                        <td>{{ $tk->abk }}</td>
                        <td>{{ $tk->facilities }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">Data TK Tidak ditemukan</p>
    @endif

@endsection
