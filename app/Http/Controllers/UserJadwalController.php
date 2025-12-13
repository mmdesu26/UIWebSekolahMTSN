<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class UserJadwalController extends Controller
{
    public function index()
    {
        $hariList = JadwalPelajaran::getHariList();
        $kelasList = JadwalPelajaran::getKelasList();

        // Ambil jadwal per kelas, dikelompokkan per hari
        $jadwal = [];
        foreach ($kelasList as $kelas) {
            $jadwal[$kelas] = JadwalPelajaran::where('kelas', $kelas)
                ->orderBy('urutan')
                ->get()
                ->groupBy('hari');
        }

        return view('user.akademik.jadwal', compact('jadwal', 'hariList', 'kelasList'));
    }
}