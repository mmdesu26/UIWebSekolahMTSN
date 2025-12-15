<?php

namespace App\Http\Controllers;

use App\Models\KelasProgram;
use Illuminate\Http\Request;

class UserKelasProgramController extends Controller
{
    public function index()
    {
        $programUnggulan = KelasProgram::active()
            ->kategori('unggulan')
            ->ordered()
            ->get();

        $programKelas = KelasProgram::active()
            ->kategori('kelas')
            ->ordered()
            ->get();

        return view('user.akademik.kelas_program', compact('programUnggulan', 'programKelas'));
    }
}