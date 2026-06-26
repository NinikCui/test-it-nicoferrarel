@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table A - Edit Data</h5>

<div class="card">
    <div class="card-body">
        <form action="{{ route('table-a.update', $item->kode_toko_baru) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode Toko Baru</label>
                <input type="number" class="form-control" value="{{ $item->kode_toko_baru }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Toko Lama <small class="text-muted">(opsional)</small></label>
                <input type="number" name="kode_toko_lama" class="form-control @error('kode_toko_lama') is-invalid @enderror"
                    value="{{ old('kode_toko_lama', $item->kode_toko_lama) }}">
                @error('kode_toko_lama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('table-a.index') }}" class="btn btn-secondary btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection