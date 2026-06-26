@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table D - Edit Data</h5>

<div class="card">
    <div class="card-body">
        <form action="{{ route('table-d.update', $item->kode_sales) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode Sales</label>
                <input type="text" class="form-control" value="{{ $item->kode_sales }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Sales</label>
                <input type="text" name="nama_sales"
                    class="form-control @error('nama_sales') is-invalid @enderror"
                    value="{{ old('nama_sales', $item->nama_sales) }}" maxlength="20">
                @error('nama_sales')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('table-d.index') }}" class="btn btn-secondary btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection