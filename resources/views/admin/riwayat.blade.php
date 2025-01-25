@extends('layout.main')

@section('content')
<div class="container">
    <h1>Riwayat Akad</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Status Terkini</th>
                <th>Riwayat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($akads as $akad)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $akad->nama_lengkap }}</td>
                    <td>{{ $akad->status }}</td>
                    <td>
                        @if(!empty($akad->riwayat))
                            <ul>
                                @foreach($akad->riwayat as $item)
                                    <li>
                                        Status: {{ $item['status'] }}, Diubah pada: {{ $item['changed_at'] }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada riwayat.</p>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data riwayat akad.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
