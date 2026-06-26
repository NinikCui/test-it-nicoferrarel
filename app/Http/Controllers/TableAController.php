<?php

namespace App\Http\Controllers;

use App\Exports\TableAExport;
use App\Imports\TableAImport;
use App\Models\TableA;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableAController extends Controller
{
    public function index()
    {
        $data = TableA::all();

        return view('table-a.index', compact('data'));
    }

    public function create()
    {
        return view('table-a.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_toko_baru' => 'required|integer|unique:table_a,kode_toko_baru',
            'kode_toko_lama' => 'nullable|integer',
        ]);

        TableA::create($request->only('kode_toko_baru', 'kode_toko_lama'));

        return redirect()->route('table-a.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $item = TableA::findOrFail($id);

        return view('table-a.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = TableA::findOrFail($id);

        return view('table-a.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_toko_lama' => 'nullable|integer',
        ]);

        $item = TableA::findOrFail($id);
        $item->update($request->only('kode_toko_lama'));

        return redirect()->route('table-a.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        TableA::findOrFail($id)->delete();

        return redirect()->route('table-a.index')->with('success', 'Data berhasil dihapus!');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TableAImport, $request->file('file'));

        return redirect()->route('table-a.index')->with('success', 'Import berhasil!');
    }

    public function exportExcel()
    {
        return Excel::download(new TableAExport, 'table_a.xlsx');
    }

    public function exportPdf()
    {
        $data = TableA::all();
        $pdf = Pdf::loadView('table-a.pdf', compact('data'));

        return $pdf->download('table_a.pdf');
    }
}
