<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LspopController;
use App\Http\Controllers\SpopController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\NeracaBPKController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\RealisasiKelurahanController;
use App\Http\Controllers\SKNJOPController;
use App\Http\Controllers\SummaryNeracaBPKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HasilInputPelayananController;
use App\Http\Controllers\SummaryNeracaKPPController;
use App\Http\Controllers\NeracaKPPController;
use App\Http\Controllers\NJOPTKPController;
use App\Http\Controllers\PelayananLaporanController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::get('/', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('lspop', LspopController::class)->except([
    'show'  // Menggunakan rute khusus untuk 'show'
]);

Route::get('/lspop/detail/{lspop}', [LspopController::class, 'show'])->name('lspop.show');
Route::get('/lspop-data', [LspopController::class, 'data'])->name('lspop.data');

Route::resource('spop', SpopController::class)->except([
    'show'  // Menggunakan rute khusus untuk 'show'
]);

Route::get('/spop/detail/{NOP}', [SpopController::class, 'show'])->name('spop.show');
Route::post('/spop/search', [SpopController::class, 'search'])->name('spop.search');
Route::get('/spop/create', [SpopController::class, 'create'])->name('spop.create');
Route::post('/spop/store', [SpopController::class, 'store'])->name('spop.store');
Route::get('/spop-data', [SpopController::class, 'data'])->name('spop.data');

Route::resource('provinsi', ProvinsiController::class);
Route::resource('kabupaten', KabupatenController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kelurahan', KelurahanController::class);

Route::get('/kelurahan/{kdPropinsi}/{kdDati2}/{kdKecamatan}/{kdKelurahan}/{no}', [KelurahanController::class, 'show'])->name('kelurahan.show');
Route::get('/kecamatan/{kdPropinsi}/{kdDati2}/{kdKecamatan}/{no}', [KecamatanController::class, 'show'])->name('kecamatan.show');
Route::get('/kabupaten/{kdPropinsi}/{kdDati2}/{no}', [KabupatenController::class, 'show'])->name('kabupaten.show');
Route::get('/provinsi/{kdPropinsi}/{no}', [ProvinsiController::class, 'show'])->name('provinsi.show');

Route::resource('pelayanan', PelayananController::class);

Route::get('/pelayanan/detail/{ID}', [PelayananController::class, 'show'])->name('pelayanan.show');
Route::get('/pelayanan-laporan', [PelayananController::class, 'laporan'])->name('pelayanan.laporan');
Route::get('/pelayanan/edit/{ID}', [PelayananController::class, 'edit'])->name('pelayanan.edit');
Route::get('/pelayanan-data', [PelayananController::class, 'data'])->name('pelayanan.data');
Route::post('/pelayanan/export_excel', [PelayananController::class, 'export'])->name('pelayanan.excel');

Route::resource('user', UserController::class);

Route::get('/user/{user}/{no}', [UserController::class, 'show'])->name('user.show');

Route::controller(PelayananLaporanController::class)->group(function () {
    Route::get('/pelayananLap', 'index')->name('pelayananLap.index');
    Route::post('/pelayananLap/cetak', 'print')->name('pelayananLap.cetak');
    Route::post('/pelayanan/lihat', 'look')->name('pelayananLap.look');
});

Route::controller(HasilInputPelayananController::class)->group(function () {
    Route::get('/hasilinput', 'index')->name('hasilInputPelayanan.index');
    Route::post('/hasilinput/cetak', 'print')->name('hasilInputPelayanan.cetak');
});

Route::controller(InformasiPBBController::class)->group(function () {
    Route::get('/informasiPbb', 'index')->name('informasiPbb.index');
    Route::post('/informasiPbb/cetak', 'print')->name('informasiPbb.cetak');
});

Route::controller(NeracaBPKController::class)->group(function () {
    Route::get('/neracaBpk', 'index')->name('neracaBpk.index');
    Route::post('/neracaBpk/cetak', 'print')->name('neracaBpk.cetak');
});

Route::controller(NeracaKPPController::class)->group(function () {
    Route::get('/neracaKpp', 'index')->name('neracaKpp.index');
    Route::post('/neracaKpp/cetak', 'print')->name('neracaKpp.cetak');
});

Route::controller(RealisasiKelurahanController::class)->group(function () {
    Route::get('/realisasiKel', 'index')->name('realisasiKel.index');
    Route::post('/realisasiKel/cetak', 'print')->name('realisasiKel.cetak');
    Route::post('/realisasiKel/lihat', 'look')->name('realisasiKel.lihat');
    Route::post('/realisasiKel/export_excel', 'export')->name('realisasiKel.excel');
});

Route::controller(SKNJOPController::class)->group(function () {
    Route::get('/skNjop', 'index')->name('skNjop.index');
    Route::post('/skNjop/cetak', 'print')->name('skNjop.cetak');
});

Route::controller(SummaryNeracaBPKController::class)->group(function () {
    Route::get('/summaryBPK', 'index')->name('summaryNerBPK.index');
    Route::post('/summaryBPK', 'print')->name('summaryNerBPK.cetak');
});

Route::controller(SummaryNeracaKPPController::class)->group(function () {
    Route::get('/summaryKPP', 'index')->name('summaryNerKPP.index');
    Route::post('/summaryKPP/lihat', 'look')->name('summaryNerKPP.look');
});

Route::controller(ValidasiController::class)->group(function () {
    Route::get('/validasi', 'index')->name('validasi.index');
    Route::post('/validasi/cetak', 'export')->name('validasi.export');
    Route::post('/validasi/lihat', 'look')->name('validasi.lihat');
    Route::get('/validasi/assign', 'assign')->name('validasi.assign');
    Route::get('/validasi/laporan', 'laporan')->name('validasi.laporan');
});

Route::controller(NJOPTKPController::class)->group(function () {
    Route::get('/njoptkp', 'index')->name('njoptkp.index');
    Route::get('/njoptkp/{subjek_pajak_id}', 'edit')->name('njoptkp.edit');
    Route::post('/njoptkp/{kdPropinsi}/{kdDati2}/{kdKecamatan}/{kdKelurahan}/{kdBlok}/{noUrut}/{kdJenisOp}/{thnPajakSppt}', 'update')->name('njoptkp.update');
});

Route::controller(TunggakanController::class)->group(function () {
    Route::get('/tunggakan', 'index')->name('tunggakan.index');
    Route::post('/tunggakan/cetak', 'print')->name('tunggakan.cetak');
});

Route::controller(TarifController::class)->group(function () {
    Route::get('/tarif/create', 'create')->name('tarif.create');
    Route::post('/tarif', 'store')->name('tarif.store');
    Route::get('/tarif', 'index')->name('tarif.index');
    Route::get('/tarif/{KD_PROPINSI}/{KD_DATI2}/{THN_AWAL}/{THN_AKHIR}/{NJOP_MIN}', 'edit')->name('tarif.edit');
    Route::post('/tarif/update', 'update')->name('tarif.update');
    Route::delete('/tarif/{KD_PROPINSI}/{KD_DATI2}/{THN_AWAL}/{THN_AKHIR}/{NJOP_MIN}', 'destroy')->name('tarif.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute untuk pembuatan SPOP baru
Route::get('/spop/create', [SpopController::class, 'create'])->name('spop.create');

// Rute untuk pencarian SPOP berdasarkan NOP
Route::get('/spop/search', [SpopController::class, 'search'])->name('spop.search');

Route::post('/spop/store', [SpopController::class, 'store'])->name('spop.store');

Route::get('/test', [LspopController::class, 'test'])->name('test');
