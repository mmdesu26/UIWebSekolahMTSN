<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class UserFasilitasController extends Controller
{
    /**
     * Display fasilitas sekolah untuk user
     */
    public function index()
    {
        $fasilitasUtama = Fasilitas::getFasilitasUtama();
        $fasilitasPendukung = Fasilitas::getFasilitasPendukung();

        return view('user.profil.fasilitas_sekolah', compact('fasilitasUtama', 'fasilitasPendukung'));
    }
}