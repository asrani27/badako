<?php

use App\Models\PengangkatanCpnsFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PLHController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SPMTController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KadisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PiketController;
use App\Http\Controllers\KarpegController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PensiunController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GantiPassController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KarisKarsuController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PengangkatanController;
use App\Http\Controllers\LiburNasionalController;
use App\Http\Controllers\PengangkatanCpnsFileController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::post('register', [LoginController::class, 'storeRegister']);
Route::get('lupa-password', [LupaPasswordController::class, 'index']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('bandingkan', [SuperadminController::class, 'bandingkan']);
        Route::get('belumisi/asn', [SuperadminController::class, 'asnbelumisi']);
        Route::get('belumisi/pppk', [SuperadminController::class, 'pppkbelumisi']);
        Route::get('belumisi/nonasn', [SuperadminController::class, 'nonasnbelumisi']);
        Route::get('detail/{nip}', [SuperadminController::class, 'detail']);
        // Route::get('bandingkan/data', function () {
        //     return redirect('/superadmin/bandingkan');
        // });
        Route::get('bandingkan/data', [SuperadminController::class, 'bandingkanData']);
        Route::get('beranda', [SuperadminController::class, 'index']);
        Route::get('beranda/filter', [SuperadminController::class, 'filter']);
        Route::get('/data/nomoraduan', [SuperadminController::class, 'nomor']);
        Route::post('/data/nomoraduan', [SuperadminController::class, 'updateNomor']);
        Route::get('/data/pegawai', [SuperadminController::class, 'pegawai']);
        Route::get('/data/pegawai/akun', [SuperadminController::class, 'akunPegawai']);
        Route::get('/data/pegawai/resetpass/{id}', [SuperadminController::class, 'resetPassPegawai']);
        Route::get('/data/pegawai/createuser/{id}', [SuperadminController::class, 'buatAkun']);
        Route::get('/data/pegawai/sync', [SuperadminController::class, 'syncPegawai']);
        Route::get('/data/pegawai/add', [SuperadminController::class, 'addPegawai']);
        Route::get('/data/pegawai/search', [SuperadminController::class, 'cariPegawai']);
        Route::post('/data/pegawai/add', [SuperadminController::class, 'storePegawai']);
        Route::get('/data/pegawai/edit/{id}', [SuperadminController::class, 'editPegawai']);
        Route::post('/data/pegawai/edit/{id}', [SuperadminController::class, 'updatePegawai']);
        Route::get('/data/pegawai/delete/{id}', [SuperadminController::class, 'deletePegawai']);
        Route::get('/data/pegawai/profile/{id}', [SuperadminController::class, 'profilPegawai']);

        Route::get('/cuti', [SuperadminController::class, 'cuti']);
        Route::get('/cuti/filter', [SuperadminController::class, 'cutiFilter']);
        Route::post('/cuti/lama', [SuperadminController::class, 'cutiLama']);
        Route::get('/cuti/pdf/{id}', [SuperadminController::class, 'cutiPdf']);
        Route::get('/cuti/batal/{id}', [SuperadminController::class, 'cutiBatal']);
        Route::get('/cuti/delete/{id}', [SuperadminController::class, 'cutiDelete']);
        Route::get('cuti/teruskan/{id}', [SuperadminController::class, 'verifikasiCuti']);
        Route::get('/cuti/search', [SuperadminController::class, 'cariCuti']);

        Route::get('/penugasan', [PenugasanController::class, 'index']);
        Route::get('/penugasan/search', [PenugasanController::class, 'search']);
        Route::get('/penugasan/add', [PenugasanController::class, 'create']);
        Route::post('/penugasan/add', [PenugasanController::class, 'store']);
        Route::get('/penugasan/edit/{id}', [PenugasanController::class, 'edit']);
        Route::post('/penugasan/edit/{id}', [PenugasanController::class, 'update']);
        Route::get('/penugasan/delete/{id}', [PenugasanController::class, 'delete']);
        Route::get('/penugasan/word/{id}', [PenugasanController::class, 'word']);

        Route::get('/plh', [PLHController::class, 'index']);
        Route::get('/plh/search', [PLHController::class, 'search']);
        Route::get('/plh/add', [PLHController::class, 'create']);
        Route::post('/plh/add', [PLHController::class, 'store']);
        Route::get('/plh/edit/{id}', [PLHController::class, 'edit']);
        Route::post('/plh/edit/{id}', [PLHController::class, 'update']);
        Route::get('/plh/delete/{id}', [PLHController::class, 'delete']);
        Route::get('/plh/word/{id}', [PLHController::class, 'word']);

        Route::get('/kadis', [KadisController::class, 'index']);
        Route::get('/kadis/add', [KadisController::class, 'create']);
        Route::post('/kadis/add', [KadisController::class, 'store']);
        Route::get('/kadis/aktifkan/{id}', [KadisController::class, 'aktifkan']);
        Route::get('/kadis/delete/{id}', [KadisController::class, 'delete']);
        Route::get('/kadis/edit/{id}', [KadisController::class, 'edit']);
        Route::post('/kadis/edit/{id}', [KadisController::class, 'update']);


        Route::get('/sekretaris', [SekretarisController::class, 'index']);
        Route::get('/sekretaris/add', [SekretarisController::class, 'create']);
        Route::post('/sekretaris/add', [SekretarisController::class, 'store']);
        Route::get('/sekretaris/aktifkan/{id}', [SekretarisController::class, 'aktifkan']);
        Route::get('/sekretaris/delete/{id}', [SekretarisController::class, 'delete']);

        Route::get('/mutasi', [MutasiController::class, 'index']);
        Route::get('/mutasi/search', [MutasiController::class, 'search']);
        Route::get('/mutasi/add', [MutasiController::class, 'create']);
        Route::post('/mutasi/add', [MutasiController::class, 'store']);
        Route::get('/mutasi/edit/{id}', [MutasiController::class, 'edit']);
        Route::post('/mutasi/edit/{id}', [MutasiController::class, 'update']);
        Route::get('/mutasi/delete/{id}', [MutasiController::class, 'delete']);
        Route::get('/mutasi/word/{id}', [MutasiController::class, 'word']);

        Route::get('/spmt', [SPMTController::class, 'index']);
        Route::get('/spmt/add', [SPMTController::class, 'create']);
        Route::get('/spmt/search', [SPMTController::class, 'search']);
        Route::post('/spmt/add', [SPMTController::class, 'store']);
        Route::get('/spmt/edit/{id}', [SPMTController::class, 'edit']);
        Route::post('/spmt/edit/{id}', [SPMTController::class, 'update']);
        Route::get('/spmt/delete/{id}', [SPMTController::class, 'delete']);
        Route::get('/spmt/word/{id}', [SPMTController::class, 'word']);

        Route::get('/berkala', [BerkalaController::class, 'index']);
        Route::get('/berkala/add', [BerkalaController::class, 'create']);
        Route::get('/berkala/search', [BerkalaController::class, 'search']);
        Route::post('/berkala/add', [BerkalaController::class, 'store']);
        Route::get('/berkala/edit/{id}', [BerkalaController::class, 'edit']);
        Route::post('/berkala/edit/{id}', [BerkalaController::class, 'update']);
        Route::get('/berkala/delete/{id}', [BerkalaController::class, 'delete']);
        Route::get('/berkala/word/{id}', [BerkalaController::class, 'word']);

        Route::get('/data/unitkerja/kode', [UnitKerjaController::class, 'kode']);
        Route::get('/data/unitkerja/resetpass/{id}', [UnitKerjaController::class, 'resetPass']);
        Route::get('/data/unitkerja/export/{id}', [UnitKerjaController::class, 'export']);
        Route::get('/data/unitkerja/akun', [UnitKerjaController::class, 'akun']);
        Route::get('/data/unitkerja', [UnitKerjaController::class, 'index']);
        Route::get('/data/unitkerja/add', [UnitKerjaController::class, 'add']);
        Route::post('/data/unitkerja/add', [UnitKerjaController::class, 'store']);
        Route::get('/data/unitkerja/edit/{id}', [UnitKerjaController::class, 'edit']);
        Route::post('/data/unitkerja/edit/{id}', [UnitKerjaController::class, 'update']);
        Route::get('/data/unitkerja/delete/{id}', [UnitKerjaController::class, 'delete']);

        Route::get('/data/liburnasional', [LiburNasionalController::class, 'index']);
        Route::get('/data/liburnasional/add', [LiburNasionalController::class, 'add']);
        Route::post('/data/liburnasional/add', [LiburNasionalController::class, 'store']);
        Route::get('/data/liburnasional/edit/{id}', [LiburNasionalController::class, 'edit']);
        Route::post('/data/liburnasional/edit/{id}', [LiburNasionalController::class, 'update']);
        Route::get('/data/liburnasional/delete/{id}', [LiburNasionalController::class, 'delete']);

        Route::get('role', [RoleController::class, 'index']);
        Route::get('akun', [AkunController::class, 'index']);
        Route::get('akun/add', [AkunController::class, 'create']);
        Route::post('akun/add', [AkunController::class, 'store']);
        Route::get('akun/edit/{id}', [AkunController::class, 'edit']);
        Route::post('akun/edit/{id}', [AkunController::class, 'update']);
        Route::get('akun/delete/{id}', [AkunController::class, 'delete']);
        Route::get('timeline/{id}', [SuperadminController::class, 'timeline']);
        Route::get('permohonan/delete/{id}', [SuperadminController::class, 'deletePermohonan']);


        Route::get('usulan1', [UsulanController::class, 'usulan1']);

        Route::get('usulan1/setuju/{id}', [PengangkatanController::class, 'dinkesSetuju']);
        Route::get('usulan1/tolak/{id}', [PengangkatanController::class, 'dinkesMenolak']);
        Route::get('usulan1/delete/{id}', [PengangkatanController::class, 'dinkesDelete']);

        Route::get('usulan2', [UsulanController::class, 'usulan2']);
        Route::get('usulan3', [UsulanController::class, 'usulan3']);
        Route::get('usulan4', [UsulanController::class, 'usulan4']);

        Route::get('pensiun/teruskan/{id}', [UsulanController::class, 'verifikasi_dinkes']);
        Route::get('pensiun/tolak/{id}', [UsulanController::class, 'pensiun_ditolak']);

        Route::get('usulan5', [UsulanController::class, 'usulan5']);
        Route::get('usulan6', [UsulanController::class, 'usulan6']);
        Route::get('usulan7', [UsulanController::class, 'usulan7']);
        Route::get('usulan8', [UsulanController::class, 'usulan8']);
        Route::get('usulan9', [UsulanController::class, 'usulan9']);
        Route::get('usulan10', [UsulanController::class, 'usulan10']);
        Route::get('usulan11', [UsulanController::class, 'usulan11']);
        Route::get('usulan12', [UsulanController::class, 'usulan12']);
        Route::get('usulan13', [UsulanController::class, 'usulan13']);
        Route::get('usulan14', [UsulanController::class, 'usulan14']);
        Route::get('usulan15', [UsulanController::class, 'usulan15']);
        Route::get('usulan16', [UsulanController::class, 'usulan16']);
    });
});

Route::group(['middleware' => ['auth', 'role:pegawai']], function () {
    Route::prefix('pegawai')->group(function () {
        Route::get('pengangkatan', [PengangkatanController::class, 'pegawai']);
        Route::get('pengangkatan/add', [PengangkatanController::class, 'addPengangkatan']);
        Route::post('pengangkatan/add', [PengangkatanController::class, 'storePengangkatan']);
        Route::get('pengangkatan/delete/{id}', [PengangkatanController::class, 'deletePengangkatan']);
        Route::post('pengangkatan/upload', [PengangkatanCpnsFileController::class, 'upload']);
        Route::get('pengangkatan/deletefile/{id}', [PengangkatanCpnsFileController::class, 'deleteFile']);

        Route::get('pengangkatan/surat1/{id}', [PengangkatanController::class, 'surat1']);
        Route::get('pengangkatan/surat2/{id}', [PengangkatanController::class, 'surat2']);
        Route::get('pengangkatan/surat3/{id}', [PengangkatanController::class, 'surat3']);
        Route::get('pengangkatan/surat4/{id}', [PengangkatanController::class, 'surat4']);

        Route::get('karpeg', [KarpegController::class, 'index']);
        Route::get('kariskarsu', [KarisKarsuController::class, 'index']);

        Route::get('pensiun', [PensiunController::class, 'index']);
        Route::get('pensiun/add', [PensiunController::class, 'create']);
        Route::post('pensiun/add', [PensiunController::class, 'store']);
        Route::get('pensiun/edit/{id}', [PensiunController::class, 'edit']);
        Route::post('pensiun/edit/{id}', [PensiunController::class, 'update']);
        Route::get('pensiun/delete/{id}', [PensiunController::class, 'delete']);

        Route::get('pensiun/surat/{id}/isipasangan', [PensiunController::class, 'isipasangan']);
        Route::post('pensiun/surat/{id}/isipasangan', [PensiunController::class, 'store_pasangan']);
        Route::post('pensiun/surat/{id}/anak1', [PensiunController::class, 'store_anak1']);
        Route::post('pensiun/surat/{id}/anak2', [PensiunController::class, 'store_anak2']);
        Route::post('pensiun/surat/{id}/anak3', [PensiunController::class, 'store_anak3']);

        Route::get('surat/{id}/permohonan', [PensiunController::class, 'permohonan']);
        Route::get('surat/{id}/pidana', [PensiunController::class, 'pidana']);
        Route::get('surat/{id}/hukuman', [PensiunController::class, 'hukuman']);
        Route::get('surat/{id}/skpd', [PensiunController::class, 'skpd']);
        Route::get('pensiun/verifikasi', [PensiunController::class, 'verifikasi']);
        Route::get('pensiun/teruskan/{id}', [PensiunController::class, 'verifikasi_atasan']);
        Route::get('pensiun/verifikasi_sekretaris', [PensiunController::class, 'verifikasi_sekretaris']);
        Route::get('pensiun/verifikasi_sekretaris/{id}', [PensiunController::class, 'verifikasiSekretaris']);
        Route::get('pensiun/verifikasi_kadis', [PensiunController::class, 'verifikasi_kadis']);
        Route::get('pensiun/verifikasi_kadis/{id}', [PensiunController::class, 'verifikasiKadis']);

        Route::get('cuti', [CutiController::class, 'index']);
        Route::get('cuti/add', [CutiController::class, 'create']);
        Route::get('cuti/setujui/{id}', [CutiController::class, 'setujui']);
        Route::get('cuti/buktidukung/{id}', [CutiController::class, 'buktidukung']);
        Route::post('cuti/buktidukung/{id}', [CutiController::class, 'upload']);
        Route::get('cuti/pdf/{id}', [CutiController::class, 'pdf']);
        Route::get('cuti/tolak/{id}', [CutiController::class, 'tolak']);

        Route::get('cuti/kadis/setujui/{id}', [CutiController::class, 'kadisSetujui']);
        Route::get('cuti/setujuiatasan/{id}', [CutiController::class, 'atasanSetujui']);
        Route::post('cuti/setujuiatasan/{id}', [CutiController::class, 'verifAtasanLangsungSetuju']);
        Route::get('cuti/kadis/tolak/{id}', [CutiController::class, 'kadisTolak']);
        Route::get('cuti/verifikasi', [CutiController::class, 'verifikasi']);
        Route::get('cuti/verifikasi_kadis', [CutiController::class, 'verifikasi_kadis']);
        Route::get('cuti/verifikasi_sekretaris', [CutiController::class, 'verifikasi_sekretaris']);

        Route::get('cpns/verifikasi', [PengangkatanController::class, 'verifikasiCpns']);
        Route::get('cpns/verifikasi/setuju/{id}', [PengangkatanController::class, 'atasanSetuju']);
        Route::get('cpns/verifikasi/tolak/{id}', [PengangkatanController::class, 'atasanMenolak']);

        Route::get('cpns/sekretaris', [PengangkatanController::class, 'verifikasiSekretaris']);
        Route::get('cpns/sekretaris/setuju/{id}', [PengangkatanController::class, 'sekretarisSetuju']);
        Route::get('cpns/sekretaris/tolak/{id}', [PengangkatanController::class, 'sekretarisMenolak']);

        Route::get('cpns/kadis', [PengangkatanController::class, 'verifikasiKadis']);
        Route::get('cpns/kadis/setuju/{id}', [PengangkatanController::class, 'KadisSetuju']);
        Route::get('cpns/kadis/tolak/{id}', [PengangkatanController::class, 'KadisMenolak']);

        Route::get('cuti/teruskan/{id}', [CutiController::class, 'verifikasiSekretaris']);
        Route::post('cuti/verifikasi/atasanlangsungsetuju', [CutiController::class, 'verifAtasanLangsungSetuju']);
        Route::get('cuti/delete/{id}', [CutiController::class, 'delete']);
        Route::post('cuti/add', [CutiController::class, 'store']);
        Route::get('beranda', [PegawaiController::class, 'beranda']);
        Route::post('ubahfoto', [PegawaiController::class, 'ubahfoto']);
        Route::get('biodata/edit', [PegawaiController::class, 'edit']);
        Route::get('biodata/edit/cuti', [PegawaiController::class, 'editCuti']);
        Route::get('biodata/edit/status', [PegawaiController::class, 'editStatus']);
        Route::get('biodata/edit/profile', [PegawaiController::class, 'editProfile']);
        Route::get('biodata/edit/kependudukan', [PegawaiController::class, 'editKependudukan']);
        Route::get('biodata/edit/bpjs', [PegawaiController::class, 'editBPJS']);
        Route::get('biodata/edit/pendidikan', [PegawaiController::class, 'editPendidikan']);
        Route::get('biodata/edit/alamat', [PegawaiController::class, 'editAlamat']);
        Route::get('biodata/edit/npwp', [PegawaiController::class, 'editNPWP']);
        Route::get('biodata/edit/kepegawaian', [PegawaiController::class, 'editKepegawaian']);
        Route::post('biodata/edit/cuti', [PegawaiController::class, 'updateCuti']);
        Route::post('biodata/edit/kepegawaian', [PegawaiController::class, 'updateKepegawaian']);
        Route::post('biodata/edit/kepegawaian/pppk', [PegawaiController::class, 'updateKepegawaianPPPK']);
        Route::post('biodata/edit/kepegawaian/nonasn', [PegawaiController::class, 'updateKepegawaianNONASN']);
        Route::post('biodata/edit/profile', [PegawaiController::class, 'updateProfile']);
        Route::post('biodata/edit/kependudukan', [PegawaiController::class, 'updateKependudukan']);
        Route::post('biodata/edit/bpjs', [PegawaiController::class, 'updateBPJS']);
        Route::post('biodata/edit/pendidikan', [PegawaiController::class, 'updatePendidikan']);
        Route::post('biodata/edit/alamat', [PegawaiController::class, 'updateAlamat']);
        Route::post('biodata/edit/npwp', [PegawaiController::class, 'updateNPWP']);
        Route::post('biodata/edit/status', [PegawaiController::class, 'updateStatus']);
    });
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('pengangkatan', [PengangkatanController::class, 'admin']);
        Route::get('pengangkatan/teruskan/{id}', [PengangkatanController::class, 'verifikasi_admin']);

        Route::get('pensiun', [AdminController::class, 'pensiun']);

        Route::get('cuti', [AdminController::class, 'cuti']);
        Route::get('/cuti/search', [AdminController::class, 'cariCuti']);

        Route::get('pensiun/teruskan/{id}', [AdminController::class, 'pensiunSetujui']);

        Route::get('cuti/teruskan/{id}', [AdminController::class, 'cutiSetujui']);
        Route::get('belumisi/asn', [AdminController::class, 'asnbelumisi']);
        Route::get('belumisi/pppk', [AdminController::class, 'pppkbelumisi']);
        Route::get('belumisi/nonasn', [AdminController::class, 'nonasnbelumisi']);
        Route::get('detail/{nip}', [AdminController::class, 'detail']);
        Route::get('beranda', [AdminController::class, 'beranda']);
        Route::get('profil', [AdminController::class, 'profil']);
        Route::post('profil', [AdminController::class, 'updateProfil']);
        Route::get('/data/pegawai', [AdminController::class, 'pegawai']);
        Route::get('/data/pegawai/resetpass/{id}', [AdminController::class, 'resetPassPegawai']);
        Route::get('/data/pegawai/add', [AdminController::class, 'addPegawai']);
        Route::post('/data/pegawai/add', [AdminController::class, 'storePegawai']);
        Route::get('/data/pegawai/edit/{id}', [AdminController::class, 'editPegawai']);
        Route::post('/data/pegawai/edit/{id}', [AdminController::class, 'updatePegawai']);
        Route::get('/data/pegawai/delete/{id}', [AdminController::class, 'deletePegawai']);
        Route::get('/data/pegawai/profile/{id}', [AdminController::class, 'profilPegawai']);
        Route::get('/data/pegawai/akun', [AdminController::class, 'akunPegawai']);
        Route::get('/data/pegawai/search', [AdminController::class, 'cariPegawai']);

        Route::get('/piket', [PiketController::class, 'index']);
        Route::post('/piket/add', [PiketController::class, 'store']);
        Route::get('/piket/add', [PiketController::class, 'create']);
        Route::get('/piket/edit/{id}', [PiketController::class, 'edit']);
        Route::post('/piket/edit/{id}', [PiketController::class, 'update']);
        Route::get('/piket/delete/{id}', [PiketController::class, 'delete']);
    });
});
Route::group(['middleware' => ['auth', 'role:superadmin|pegawai|admin']], function () {

    Route::get('/pensiun/surat/{id}/permohonan', [PDFController::class, 'pensiun_permohonan']);
    Route::get('/pensiun/surat/{id}/pidana', [PDFController::class, 'pensiun_pidana']);
    Route::get('/pensiun/surat/{id}/hukuman', [PDFController::class, 'pensiun_hukuman']);
    Route::get('/pensiun/surat/{id}/skpd', [PDFController::class, 'pensiun_skpd']);
    Route::get('/pensiun/surat/{id}/penerima', [PDFController::class, 'pensiun_penerima']);

    Route::get('/logout', [LogoutController::class, 'logout']);

    Route::get('gantipass', [GantiPassController::class, 'index']);
    Route::post('gantipass', [GantiPassController::class, 'update']);
});
