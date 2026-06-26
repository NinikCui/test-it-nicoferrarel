@extends('layouts.app')

@section('content')
<h5 class="mb-3">Table C - Edit Data</h5>

<div class="card">
    <div class="card-body">
        <form action="{{ route('table-c.update', $item->kode_toko) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode Toko</label>
                <input type="number" class="form-control" value="{{ $item->kode_toko }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Area Sales</label>
                <input type="text" name="area_sales"
                    class="form-control @error('area_sales') is-invalid @enderror"
                    value="{{ old('area_sales', $item->area_sales) }}" maxlength="10">
                @error('area_sales')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('table-c.index') }}" class="btn btn-secondary btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection