<?php

namespace App\Http\Controllers;

use App\Exports\TableDExport;
use App\Imports\TableDImport;
use App\Models\TableD;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableDController extends Controller
{
    public function index()
    {
        $data = TableD::all();

        return view('table-d.index', compact('data'));
    }

    public function create()
    {
        return view('table-d.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_sales' => 'required|string|unique:table_d,kode_sales',
            'nama_sales' => 'required|string|max:20',
        ]);

        TableD::create($request->only('kode_sales', 'nama_sales'));

        return redirect()->route('table-d.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $item = TableD::findOrFail($id);

        return view('table-d.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = TableD::findOrFail($id);

        return view('table-d.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sales' => 'required|string|max:20',
        ]);

        $item = TableD::findOrFail($id);
        $item->update($request->only('nama_sales'));

        return redirect()->route('table-d.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        TableD::findOrFail($id)->delete();

        return redirect()->route('table-d.index')->with('success', 'Data berhasil dihapus!');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TableDImport, $request->file('file'));

        return redirect()->route('table-d.index')->with('success', 'Import berhasil!');
    }

    public function exportExcel()
    {
        return Excel::download(new TableDExport, 'table_d.xlsx');
    }

    public function exportPdf()
    {
        $data = TableD::all();
        $pdf = Pdf::loadView('table-d.pdf', compact('data'));

        return $pdf->download('table_d.pdf');
    }
}
