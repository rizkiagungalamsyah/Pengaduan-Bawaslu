<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporanAdmin()
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        $tanggapan = User::join('pengaduan', 'pengaduan.id', '=', 'users.id')
            ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
            ->get();
        return view(
            'admin.laporan',
            [
                'lapor' => $laporan,
                'tanggapan' => $tanggapan
            ]
        );
    }

    public function laporanAdminValidasi()
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        return view(
            'admin.laporanValidasi',
            [
                'lapor' => $laporan
            ]
        );
    }

    public function laporanAdminSelesai()
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        $tanggapan = User::join('pengaduan', 'pengaduan.id', '=', 'users.id')
            ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
            ->get();
        return view(
            'admin.laporanSelesai',
            [
                'lapor' => $laporan,
                'tanggapan' => $tanggapan
            ]
        );
    }

    public function laporanPetugas()
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        return view(
            'petugas.laporan',
            [
                'lapor' => $laporan
            ]
        );
    }

    public function laporanPetugasSelesai()
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        $tanggapan = User::join('pengaduan', 'pengaduan.id', '=', 'users.id')
            ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
            ->get();
        return view(
            'petugas.tanggapan',
            [
                'lapor' => $laporan,
                'tanggapan' => $tanggapan
            ]
        );
    }

    public function adminRegister()
    {
        return view('admin.adminRegister', [
            'users' => User::get()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tanggapan = User::join('pengaduan', 'pengaduan.id', '=', 'users.id')
            ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
            ->get();

        return view('user.index', [
            'pengaduan' => Pengaduan::get(),
            'tanggapan' => $tanggapan
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.index', [
            'users' => User::get()->where('type', '=', 'user'),
            'pengaduan' => Pengaduan::get(),
            'tanggapan' => Tanggapan::get()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petugasHome()
    {
        return view('petugas.index', [
            'users' => User::get()->where('type', '=', 'user'),
            'pengaduan' => Pengaduan::get(),
            'tanggapan' => Tanggapan::get()
        ]);
    }

    public function detail($id_pengaduan)
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        return view(
            'admin.laporanDetail',
            [
                'pengaduan' => $laporan->where('id_pengaduan', $id_pengaduan)
            ]
        );
    }

    public function laporanDetailPetugas($id_pengaduan)
    {
        $laporan = DB::table('users')
            ->join('pengaduan', 'users.id', '=', 'pengaduan.id')
            ->select('users.*', 'pengaduan.*')
            ->get();
        return view(
            'petugas.laporanDetail',
            [
                'pengaduan' => $laporan->where('id_pengaduan', $id_pengaduan)
            ]
        );
    }

    public function laporanUser()
    {
        $laporan = DB::table('users', 'users.id', '=', 'pengaduan.id')
            ->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->get();
    }
}
