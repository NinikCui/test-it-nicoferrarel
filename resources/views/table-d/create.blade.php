@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table D - Tambah Data</h5>

<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#form-tab">Form</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#excel-tab">Upload Excel</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="form-tab">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('table-d.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Sales</label>
                        <input type="text" name="kode_sales"
                            class="form-control @error('kode_sales') is-invalid @enderror"
                            value="{{ old('kode_sales') }}">
                        @error('kode_sales')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Sales</label>
                        <input type="text" name="nama_sales"
                            class="form-control @error('nama_sales') is-invalid @enderror"
                            value="{{ old('nama_sales') }}" maxlength="20">
                        @error('nama_sales')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('table-d.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="excel-tab">
        <div class="card">
            <div class="card-body">
                <p class="text-muted small">Format kolom Excel: <code>kode_sales</code>, <code>nama_sales</code></p>
                <form action="{{ route('table-d.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Pilih File Excel</label>
                        <input type="file" name="file"
                            class="form-control @error('file') is-invalid @enderror"
                            accept=".xlsx,.xls,.csv">
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('table-d.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection