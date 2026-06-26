<?php

namespace App\Http\Controllers;

use App\Exports\TableBExport;
use App\Imports\TableBImport;
use App\Models\TableB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TableBController extends Controller
{
    public function index()
    {
        $data = TableB::all();

        return view('table-b.index', compact('data'));
    }

    public function create()
    {
        return view('table-b.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_toko' => 'required|integer',
            'nominal_transaksi' => 'required|numeric|min:0',
        ]);

        DB::table('table_b')->insert([
            'kode_toko' => $request->kode_toko,
            'nominal_transaksi' => $request->nominal_transaksi,
        ]);

        return redirect()->route('table-b.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $kode_toko)
    {
        $item = DB::table('table_b')->where('kode_toko', $kode_toko)->firstOrFail();

        return view('table-b.show', compact('item'));
    }

    public function edit(string $kode_toko)
    {
        $item = DB::table('table_b')->where('kode_toko', $kode_toko)->firstOrFail();

        return view('table-b.edit', compact('item'));
    }

    public function update(Request $request, string $kode_toko)
    {
        $request->validate([
            'nominal_transaksi' => 'required|numeric|min:0',
        ]);

        DB::table('table_b')
            ->where('kode_toko', $kode_toko)
            ->update(['nominal_transaksi' => $request->nominal_transaksi]);

        return redirect()->route('table-b.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(string $kode_toko)
    {
        DB::table('table_b')->where('kode_toko', $kode_toko)->delete();

        return redirect()->route('table-b.index')->with('success', 'Data berhasil dihapus!');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TableBImport, $request->file('file'));

        return redirect()->route('table-b.index')->with('success', 'Import berhasil!');
    }

    public function exportExcel()
    {
        return Excel::download(new TableBExport, 'table_b.xlsx');
    }

    public function exportPdf()
    {
        $data = TableB::all();
        $pdf = Pdf::loadView('table-b.pdf', compact('data'));

        return $pdf->download('table_b.pdf');
    }
}
