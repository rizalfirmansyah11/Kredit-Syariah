@extends('layout.main')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <!-- Notifikasi Pesan Sukses -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 20px;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><strong>User Data</strong></h3>

                            <div class="d-flex align-items-center ml-auto">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-primary mr-2">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                                <form action="{{ route('admin.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 200px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Cari Nama / No Telepon" value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $d)
                                    <tr>
                                        <td>{{ $d->nomor_urut }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->phone }}</td>
                                        <td>{{ $d->address }}</td>
                                        <td>
                                            @if ($d->role === 'admin')
                                                <span style="color: green; font-weight: bold;">{{ $d->role }}</span>
                                            @else
                                                {{ $d->role }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}" class="btn btn-primary">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah kamu yakin ingin menghapus data user <b>{{ $d->name }}</b>?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{ route('admin.user.delete', ['id' => $d->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Ya, Hapus Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix d-flex justify-content-end">
                            <ul class="pagination pagination-sm m-0">
                                {{ $data->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>
@endsection
