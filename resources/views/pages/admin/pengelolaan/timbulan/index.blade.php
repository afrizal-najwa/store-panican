@extends('layouts.admin')

@section('title')
    Kelola Data Timbulan Sampah
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Timbulan Sampah</h2>
                <p class="dashboard-subtitle">
                    Kelola data timbulan sampah
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('timbulan.create') }}" class="btn btn-primary mb-3">
                                    + Tambah data timbulan baru
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Nama Wilayah</th>
                                                <th>Jumlah (ton)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
<script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax:{
            url: '{{ route('timbulan.index') }}' // Memastikan URL menuju method index yang benar
        },
        columns:[
            {data: 'kategori', name:'kategori'},
            {data: 'nama', name:'nama'}, // Nama wilayah
            {data: 'jumlah', name:'jumlah'}, // Jumlah timbulan sampah
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%'
            }
        ]
    });
</script>
@endpush
