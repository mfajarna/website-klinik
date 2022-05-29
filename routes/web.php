<?php

use App\Http\Controllers\AbsensiDokterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarberobatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DokterPoliController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PdfAntrianController;
use App\Http\Controllers\Pendaftaranpemeriksaan;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RiwayatBerobatController;
use App\Http\Controllers\RiwayatkesehatanController;
use App\Http\Controllers\UploadKegiatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('auth-login', LandingController::class);

Route::get('/display-antrian', [DashboardController::class,'displayAntrian']);

Route::resource('/', IndexController::class);

Route::get('auth-register', [LandingController::class, 'register']);

Route::resource('pdf-antrian', PdfAntrianController::class);

Route::get('/download-pdf-antrian/{id}', [PdfAntrianController::class, 'exportPdf']);
Route::get('pdf-antrian-kios', [PdfAntrianController::class, 'kios_pdf'])->name('pdf-antrian.kios');

// resource
Route::resource('kios', KiosController::class);
Route::get('get-pasien-kios', [KiosController::class, 'getPasien'])->name('kios.getpasienkios');
Route::post('kios-pasien-baru', [KiosController::class, 'createPasienTerdaftar'])->name('kios.createpasienbaru');
Route::post('/autocomplete-search', [KiosController::class, 'autocompleteSearch'])->name('autocomplete.pasien');


Route::group(['prefix' => 'menu', 'as' => 'menu.', 'middleware' => 'auth'],
    function()
    {
        Route::resource('dashboard', DashboardController::class);

        // Route Poli
        Route::resource('poli', PoliController::class);
            // Route Hapus Poli
            Route::get('remove-poli', [PoliController::class, 'delete']);

        // Route Antrian
        Route::resource('antrian', AntrianController::class);
        Route::get('/edit-status', [AntrianController::class, 'editStatus'])->name('antrian.editstatus');
        Route::get('/reset-antrian', [AntrianController::class, 'resetAntrian'])->name('antrian.reset');
        Route::get('/next-antrian', [AntrianController::class, 'nextAntrian'])->name('antrian.next');


        // Route Dokter
        Route::resource('dokter', DokterController::class);
        Route::get('view-jadwal', [DokterController::class, 'lihatJadwalKerja'])->name('dokter.view-jadwal');
        Route::get('pemeriksaan-pasien/{id}', [DokterController::class, 'pemeriksaanPasien'])->name('dokter.pemeriksaanpasien');
        Route::post('pemeriksaan-create', [DokterController::class, 'createPemeriksaan'])->name('dokter.pemeriksaan.create');
        Route::get('pemeriksaan-view', [DokterController::class, 'viewPdf'])->name('dokter.pemeriksaan.view-pdf');
        Route::get('pemeriksaan-download-pdf', [DokterController::class, 'printPdf'])->name('dokter.pemeriksaan.download-pdf');
        Route::get('dokterpage', [DokterController::class, 'getAllDokter'])->name('dokter.alldokter');

        // Route Dokter Poli
        Route::resource('dokter-poli', DokterPoliController::class);

        // Route Riwayat Kesehatan Dokter
        Route::resource('riwayat-kesehatan', RiwayatkesehatanController::class);
        Route::get('/get-riwayat-kesehatan', [RiwayatkesehatanController::class, 'getRiwayatKesehatan'])->name('riwayat-kesehatan.getriwayat');
        Route::get('/print-pdf-kesehatan', [RiwayatkesehatanController::class, 'downloadPdf']);
    
        // Route Upload Jadwal Kegiatan
        Route::resource('upload-kegiatan', UploadKegiatanController::class);
        Route::get('delete-kegiatan', [UploadKegiatanController::class, 'deleteKegiatan'])->name('upload-kegiatan.hapus');

        // Route Admin Controller
        Route::resource('admin', AdminController::class);
        Route::get('hapus-admin', [AdminController::class, 'hapusAdmin'])->name('admin.hapus');


        // Route Abensi Dokter
        Route::resource('absensi-dokter', AbsensiDokterController::class);
        Route::get('/get-absensi-dokter', [AbsensiDokterController::class, 'getDokterAbsensi'])->name('absensidokter.get');

        // Pendaftaran Pasien
        Route::resource('pendaftaran', Pendaftaranpemeriksaan::class);
        Route::get('/getPasien', [Pendaftaranpemeriksaan::class, 'getPasien'])->name('pendaftaran.getpasien');
        Route::post('/create-pasien-terdaftar', [Pendaftaranpemeriksaan::class, 'createPasienTerdaftar'])->name('pendaftaran.pasienbaru');
        Route::get('pasien/allpasien', [Pendaftaranpemeriksaan::class, 'dataPasien'])->name('pendaftaran.allpasien');
        
        // Daftar Berobat Pasien
        Route::resource('daftar-berobat', DaftarberobatController::class);

        // Riwayat Berobat Pasien
        Route::resource('riwayat-berobat-pasien', RiwayatBerobatController::class);
    }

);