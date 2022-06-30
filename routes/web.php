<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PemasokController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Pengguna\LoginController;
use App\Http\Controllers\Pengguna\ProfilController;
use App\Http\Controllers\Admin\SubKategoriController;
use App\Http\Controllers\Pengguna\RegisterController;
use App\Http\Controllers\Pengguna\KeranjangController;
use App\Http\Controllers\Pengguna\PemeriksaanController;

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

Route::get('/',                [FrontendController::class, 'index'])->name('Home');
Route::get('/login',           [LoginController::class, 'halaman_login'])->name('HalamanLogin');
Route::post('/logOut',         [LoginController::class, 'logout'])->name('UserLogOut');
Route::post('/cekLogin',       [LoginController::class, 'cek_login'])->name('CekLogin');
Route::get('/halamanRegister', [RegisterController::class, 'halaman_register'])->name('HalamanRegister');
Route::post('/register',       [RegisterController::class, 'register'])->name('Register');
Route::get('/detailProduk/{slug_produk}',    [FrontendController::class, 'detailproduk'])->name('DetailProduk');
Route::get('/kategori',        [FrontendController::class, 'kategori'])->name('Kategori');
Route::get('/subKategori/{id}',        [FrontendController::class, 'subkategori'])->name('SubKategori');
Route::get('/semuaProduk',        [FrontendController::class, 'semua_produk'])->name('SemuaProduk');
Route::get('/pencarianProduk',        [FrontendController::class, 'pencarian_produk'])->name('PencarianProduk');
Route::get('/kota/{provinsi_id}',       [FrontendController::class, 'data_kota']);

Route::middleware(['auth', 'hakAkses:Admin'])->group(function () {
    Route::get('/produk',                     [ProdukController::class, 'admin_produk'])->name('HalamanDaftarProduk');
    Route::get('/halamanTambahProduk',        [ProdukController::class, 'admin_halaman_tambah_produk'])->name('HalamanTambahProduk');
    Route::post('/tambahProduk',              [ProdukController::class, 'admin_tambah_produk'])->name('TambahProduk');
    Route::get('/halamanUbahProduk/{id}',     [ProdukController::class, 'admin_halaman_ubah_produk'])->name('HalamanUbahProduk');
    Route::post('/ubahProduk/{id}',           [ProdukController::class, 'admin_ubah_produk'])->name('UbahProduk');
    Route::get('/hapusProduk/{id}',           [ProdukController::class, 'admin_hapus_produk'])->name('HapusProduk');
    Route::get('/dataKategori/{kategori_id}', [ProdukController::class, 'admin_data_kategori']);

    Route::get('/data_kategori',         [KategoriController::class, 'admin_kategori']);
    Route::post('/tambahKategori',       [KategoriController::class, 'admin_tambah_kategori'])->name('TambahKategori');
    Route::post('/ubahKategori/{id}',    [KategoriController::class, 'admin_ubah_kategori'])->name('UbahKategori');
    Route::get('/hapusKategori/{id}',    [KategoriController::class, 'admin_hapus_kategori']);

    Route::get('/subKategori',           [SubKategoriController::class, 'admin_subkategori']);
    Route::post('/tambahSubKategori',    [SubKategoriController::class, 'admin_tambah_subkategori'])->name('TambahSubKategori');
    Route::post('/ubahSubKategori/{id}', [SubKategoriController::class, 'admin_ubah_subkategori'])->name('UbahSubKategori');
    Route::get('/hapusSubKategori/{id}', [SubKategoriController::class, 'admin_hapus_subkategori']);

    Route::get('/slider',                [SliderController::class, 'admin_slider'])->name('Slider');
    Route::post('/tambahSlider',         [SliderController::class, 'admin_tambah_slider'])->name('TambahSlider');
    Route::post('/ubahSlider/{id}',      [SliderController::class, 'admin_ubah_slider'])->name('UbahSlider');
    Route::get('/hapusSlider/{id}',      [SliderController::class, 'admin_hapus_slider'])->name('HapusSlider');

    Route::get('/pemasok',               [PemasokController::class, 'admin_pemasok']);
    Route::post('/tambahPemasok',        [PemasokController::class, 'admin_tambah_pemasok'])->name('TambahPemasok');
    Route::post('/ubahPemasok/{id}',     [PemasokController::class, 'admin_ubah_pemasok'])->name('UbahPemasok');
    Route::get('/hapusPemasok/{id}',     [PemasokController::class, 'admin_hapus_pemasok']);
    Route::get('/pesanan',               [PesananController::class, 'admin_halaman_pesanan'])->name('HalamanPesanan');
    Route::get('/pesanan/{id}',          [PesananController::class, 'admin_halaman_detail_pesanan'])->name('HalamanDetailPesanan');
    Route::post('/verifikasiPembayaran', [PesananController::class, 'admin_verifikasi_pembayaran'])->name('VerifikasiPembayaran');
    Route::post('/statusPesananLogs',    [PesananController::class, 'admin_konfirmasi_status_pesanan'])->name('StatusPesananLogs');
    
});


Route::middleware(['auth', 'hakAkses:Pelanggan'])->group(function() {
    Route::get('/profil',                   [ProfilController::class, 'profil'])->name('Profil');
    Route::post('/konfirmasiProdukDiterima',[ProfilController::class, 'konfirmasi_produk_diterima'])->name('KonfirmasiProdukDiterima');
    Route::get('/keranjang',                [FrontendController::class, 'keranjang'])->name('Keranjang');
    Route::get('/checkout',                 [FrontendController::class, 'checkout'])->name('CheckOut');
    Route::get('/totalProdukDlmKeranjang',  [FrontendController::class, 'total_produk_keranjang']);

    Route::post('/simpan_ke_keranjang',     [KeranjangController::class, 'masukkan_ke_keranjang']);
    Route::post('/hapusProdukDalamKeranjang',     [KeranjangController::class, 'hapus_produk_dalam_keranjang']);
    Route::post('/ubahKuantitasKeranjang',  [KeranjangController::class, 'ubah_kuantitas_keranjang']);
    Route::post('/tambahKeKeranjang',       [ProdukController::class, 'tambah_ke_keranjang'])->name('TambahKeKeranjang');
    Route::get('/pemeriksaan',              [PemeriksaanController::class, 'pemeriksaan'])->name('Pemeriksaan');
    Route::post('/pembayaran',              [PemeriksaanController::class, 'pembayaran'])->name('Pembayaran');
});