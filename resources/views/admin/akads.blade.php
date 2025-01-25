@extends('layout.main')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1>Daftar Akad</h1>
  </div>
  <div class="content">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gambar</th> <!-- Kolom Gambar -->
          <th>NIK</th>
          <th>Tanggal Pembuatan</th>
          <th>Kredit</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($akads as $index => $akad)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $akad->nama_lengkap }}</td>
            <td>
              @if ($akad->gambar)
              <img src="{{ asset('storage/' . $akad->foto_benda) }}" alt="Foto Benda" class="foto-benda">
              @else
                <span class="text-muted">Tidak ada gambar</span>
              @endif
            </td>
            <td>{{ $akad->nik }}</td>
            <td>{{ \Carbon\Carbon::parse($akad->created_at)->format('d-m-Y') }}</td>
            <td>Rp {{ number_format($akad->jumlah_kredit, 0, ',', '.') }}</td>
            <td>
              @if ($akad->status === 'accepted')
                <span class="badge badge-success">Diterima</span>
              @elseif ($akad->status === 'rejected')
                <span class="badge badge-danger">Ditolak</span>
              @else
                <span class="badge badge-warning">Menunggu</span>
              @endif
            </td>
            <td>
              @if ($akad->status === 'pending')
                <form action="{{ route('admin.acceptAkad', $akad->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i> Terima
                  </button>
                </form>
                <form action="{{ route('admin.rejectAkad', $akad->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-times"></i> Tolak
                  </button>
                </form>
              @else
                <span class="text-muted">Aksi tidak tersedia</span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">Tidak ada data akad.</td> <!-- Sesuaikan colspan -->
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
