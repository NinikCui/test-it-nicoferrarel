@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table B - Tambah Data</h5>

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
                <form action="{{ route('table-b.store') }}" method="POST">
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
                        <label class="form-label">Nominal Transaksi</label>
                        <input type="number" step="0.01" name="nominal_transaksi"
                            class="form-control @error('nominal_transaksi') is-invalid @enderror"
                            value="{{ old('nominal_transaksi') }}">
                        @error('nominal_transaksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('table-b.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="excel-tab">
        <div class="card">
            <div class="card-body">
                <p class="text-muted small">Format kolom Excel: <code>kode_toko</code>, <code>nominal_transaksi</code></p>
                <form action="{{ route('table-b.import') }}" method="POST" enctype="multipart/form-data">
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
                    <a href="{{ route('table-b.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-success btn-sm">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection