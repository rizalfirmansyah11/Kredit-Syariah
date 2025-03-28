@extends('layout.main')

@section('content')
<div class="content-wrapper w-80 mt-4 ms-6">
    <div class="container-fluid ps-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #3498db;">
                        <h4 class="mb-0 flex-grow-1">Manajemen Margin Kategori</h4>
                        <a href="{{ route('admin.admin.marginKategori.create') }}" class="btn btn-light">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table table-hover"> 
                                <thead style="background-color: #cecaca; color: rgb(0, 0, 0);">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Last Update</th>
                                        <th>Updated By</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;"> 
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($category->updated_at)->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</td>
                                            <td>{{ $category->updated_by ?? 'Unknown' }}</td>

                                            <td class="d-flex">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('admin.admin.marginKategori.edit', $category->id) }}" 
                                                   class="btn btn-warning btn-sm mx-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('admin.admin.admin.marginKategori.destroy', $category->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-1">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>

                                                <!-- Tombol Lihat Detail -->
                                                <a href="{{ route('admin.admin.admin.marginKategori.detail', $category->id) }}" 
                                                   class="btn btn-info btn-sm mx-1">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($categories->isEmpty())
                            <div class="alert alert-warning text-center">
                                <i class="fas fa-exclamation-circle"></i> Tidak ada kategori yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
