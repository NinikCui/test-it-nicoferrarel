<?php

use App\Http\Controllers\TableAController;
use App\Http\Controllers\TableBController;
use App\Http\Controllers\TableCController;
use App\Http\Controllers\TableDController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('table-a.index');
});

Route::resource('table-a', TableAController::class);
Route::post('table-a/import', [TableAController::class, 'importExcel'])->name('table-a.import');
Route::get('table-a/export/excel', [TableAController::class, 'exportExcel'])->name('table-a.export.excel');
Route::get('table-a/export/pdf', [TableAController::class, 'exportPdf'])->name('table-a.export.pdf');

Route::resource('table-b', TableBController::class);
Route::post('table-b/import', [TableBController::class, 'importExcel'])->name('table-b.import');
Route::get('table-b/export/excel', [TableBController::class, 'exportExcel'])->name('table-b.export.excel');
Route::get('table-b/export/pdf', [TableBController::class, 'exportPdf'])->name('table-b.export.pdf');

Route::resource('table-c', TableCController::class);
Route::post('table-c/import', [TableCController::class, 'importExcel'])->name('table-c.import');
Route::get('table-c/export/excel', [TableCController::class, 'exportExcel'])->name('table-c.export.excel');
Route::get('table-c/export/pdf', [TableCController::class, 'exportPdf'])->name('table-c.export.pdf');

Route::resource('table-d', TableDController::class);
Route::post('table-d/import', [TableDController::class, 'importExcel'])->name('table-d.import');
Route::get('table-d/export/excel', [TableDController::class, 'exportExcel'])->name('table-d.export.excel');
Route::get('table-d/export/pdf', [TableDController::class, 'exportPdf'])->name('table-d.export.pdf');
