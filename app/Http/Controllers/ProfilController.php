<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pejabat;
use App\Models\Satuan;

class ProfilController extends Controller
{
    public function index()
    {
        $pejabats = Pejabat::with('satuan')
            ->orderBy('urutan')
            ->get();

        return view('public.profil', compact('pejabats'));
    }
}
