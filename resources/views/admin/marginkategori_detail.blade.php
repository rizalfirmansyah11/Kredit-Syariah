@extends('layout.main')

@section('content')
<div class="content-wrapper w-80 mt-4 ms-6">
    <div class="container-fluid ps-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header text-white" style="background-color: #3498db;">
                        <h4 class="mb-0">Detail Margin Kategori: {{ $category->name }}</h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Margin (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if($category->name === 'Elektronik')
                                            ≤ 1 Tahun
                                        @else
                                            1 Tahun
                                        @endif
                                    </td>
                                    <td>{{ $category->margin_1 }}%</td>
                                </tr>
                                <tr>
                                    <td>2 - 3 Tahun</td>
                                    <td>{{ $category->margin_2 }}%</td>
                                </tr>
                                <tr>
                                    <td>4 - 5 Tahun</td>
                                    <td>{{ $category->margin_3 }}%</td>
                                </tr>
                                <tr>
                                    <td>6 - 10 Tahun ≥</td> {{-- Simbol "≥" menunjukkan lebih dari 10 tahun juga masuk --}}
                                    <td>{{ $category->margin_4 }}%</td>
                                </tr>
                            </tbody>
                            
                        </table>

                        <a href="{{ route('admin.admin.marginKategori.index') }}" class="btn btn-secondary mt-3">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
