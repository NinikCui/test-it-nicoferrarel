@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table C - Tambah Data</h5>

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
                <form action="{{ route('table-c.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Toko</label>
                        <input type="number" name="kode_toko"
                            class="form-control @error('kode_toko') is-invalid @enderror"
                            value="{{ old('kode_toko') }}">
                        @error('kode_toko')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Area Sales</label>
                        <input type="text" name="area_sales"
                            class="form-control @error('area_sales') is-invalid @enderror"
                            value="{{ old('area_sales') }}" maxlength="10">
                        @error('area_sales')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('table-c.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="excel-tab">
        <div class="card">
            <div class="card-body">
                <p class="text-muted small">Format kolom Excel: <code>kode_toko</code>, <code>area_sales</code></p>
                <form action="{{ route('table-c.import') }}" method="POST" enctype="multipart/form-data">
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
                    <a href="{{ route('table-c.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection