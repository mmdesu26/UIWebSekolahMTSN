<?php

namespace App\Http\Controllers\Profil;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;

class UserVisiMisiController extends Controller
{
    /**
     * Display visi misi for public
     */
    public function index()
    {
        $visiMisi = VisiMisi::getFirst();
        
        return view('user.profil.visi_misi', [
            'visiMisi' => [
                'visi' => $visiMisi->visi ?? 'Visi belum diatur',
                'misi' => $visiMisi->misi ?? 'Misi belum diatur'
            ]
        ]);
    }
}