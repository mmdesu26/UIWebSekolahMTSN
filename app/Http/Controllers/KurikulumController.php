<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Tampilkan halaman kurikulum untuk user
     */
    public function kurikulum()
    {
        $kurikulum = Kurikulum::first();
        
        return view('user.akademik.kurikulum', compact('kurikulum'));
    }
}