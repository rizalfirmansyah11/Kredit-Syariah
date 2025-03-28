@extends('layout.main')
@section('content')
<div class="content-wrapper py-4">
    <div class="container">
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-10"> <!-- Lebih lebar -->
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title m-0">Form Edit User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="email" class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Masukkan email">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Masukkan nama">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="font-weight-bold">No Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" placeholder="Masukkan no telepon">
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="font-weight-bold">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat">{{ $data->address }}</textarea>
                                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="font-weight-bold">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="nasabah" {{ $data->role == 'nasabah' ? 'selected' : '' }}>Nasabah</option>
                                    </select>
                                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
