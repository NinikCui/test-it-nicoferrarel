<?php

namespace App\Http\Controllers;

use App\Exports\TableCExport;
use App\Imports\TableCImport;
use App\Models\TableC;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TableCController extends Controller
{
    public function index()
    {
        $data = TableC::all();

        return view('table-c.index', compact('data'));
    }

    public function create()
    {
        return view('table-c.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_toko' => 'required|integer|unique:table_c,kode_toko',
            'area_sales' => 'required|string|max:10',
        ]);

        TableC::create($request->only('kode_toko', 'area_sales'));

        return redirect()->route('table-c.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $item = TableC::findOrFail($id);

        return view('table-c.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = TableC::findOrFail($id);

        return view('table-c.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'area_sales' => 'required|string|max:10',
        ]);

        $item = TableC::findOrFail($id);
        $item->update($request->only('area_sales'));

        return redirect()->route('table-c.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        TableC::findOrFail($id)->delete();

        return redirect()->route('table-c.index')->with('success', 'Data berhasil dihapus!');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            $import = new TableCImport;
            $import->import($request->file('file'));

            return redirect()->route('table-c.index')->with('success', 'Import berhasil!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Import gagal: '.$e->getMessage());
        }
    }

    public function exportExcel()
    {
        $export = new TableCExport;

        return $export->download();
    }

    public function exportPdf()
    {
        $data = TableC::all();
        $pdf = Pdf::loadView('table-c.pdf', compact('data'));

        return $pdf->download('table_c.pdf');
    }
}
