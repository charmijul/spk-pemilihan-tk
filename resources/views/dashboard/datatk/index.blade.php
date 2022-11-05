@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data TK</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8 alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive col-lg-8">
      <a href="/dashboard/datatk/create" class="btn btn-primary mb-3">Tambah Data TK baru</a>
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
                <th>NO</th>
                <th>Nama TK</th>
                <th>Kelurahan</th>
                {{-- <th>Biaya SPP (Rp)</th>
                <th>Biaya Masuk (Rp)</th>
                <th>Batas Tampung perkelas</th>
                <th>Jumlah Pengajar perkelas</th>
                <th>Akreditasi</th>
                <th>Status</th>
                <th>Menerima ABK</th>
                <th>Jumlah Fasilitas</th> --}}
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datatk as $tk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tk->name }}</td>
                        <td>{{ $tk->address }}</td>
                        {{-- <td>{{ $tk->spp }}</td>
                        <td>{{ $tk->entry_fee }}</td>
                        <td>{{ $tk->capacity }}</td>
                        <td>{{ $tk->teachers }}</td>
                        <td>{{ $tk->accreditation }}</td>
                        <td>{{ $tk->status }}</td>
                        <td>{{ $tk->abk }}</td>
                        <td>{{ $tk->facilities }}</td> --}}
                        <td>
                            <a href="/dashboard/datatk/{{ $tk->name }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="/dashboard/datatk/{{ $tk->name }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/dashboard/datatk/{{ $tk->name }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Hapus Data?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
          </tbody>
        </table>
      </div>
@endsection