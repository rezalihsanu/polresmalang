<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use App\Models\Pejabat;

class OrganisasiController extends Controller
{
    public function index()
    {
        // Root Polresta & Sub-satuan
        $satuans = Satuan::with(['children', 'pejabats'])->whereNull('parent_id')->get();
        $pejabats = Pejabat::with('satuan')->orderBy('urutan')->get();

        return view('public.organisasi', compact('satuans', 'pejabats'));
    }
}
