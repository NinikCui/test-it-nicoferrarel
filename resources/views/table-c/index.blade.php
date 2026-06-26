@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Table C - Data Area Sales</h5>
    <div>
        <a href="{{ route('table-c.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
        <a href="{{ route('table-c.export.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
        <a href="{{ route('table-c.export.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Kode Toko</th>
                    <th>Area Sales</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $item->kode_toko }}</td>
                    <td>{{ $item->area_sales }}</td>
                    <td>
                        <a href="{{ route('table-c.edit', $item->kode_toko) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('table-c.destroy', $item->kode_toko) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection