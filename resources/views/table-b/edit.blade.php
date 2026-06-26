@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table B - Edit Data</h5>

<div class="card">
    <div class="card-body">
        <form action="{{ route('table-b.update', $item->kode_toko) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode Toko</label>
                <input type="number" class="form-control" value="{{ $item->kode_toko }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nominal Transaksi</label>
                <input type="number" step="0.01" name="nominal_transaksi"
                    class="form-control @error('nominal_transaksi') is-invalid @enderror"
                    value="{{ old('nominal_transaksi', $item->nominal_transaksi) }}">
                @error('nominal_transaksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('table-b.index') }}" class="btn btn-secondary btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection