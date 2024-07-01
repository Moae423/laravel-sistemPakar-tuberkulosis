<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function index(Request $request)
    {
        $query = Result::where('namaPasien', Auth::user()->namaPasien);
       // Filter berdasarkan nama pasien jika ada
    if ($request->filled('namaPasien')) {
        $query->where('namaPasien', 'like', '%' . $request->namaPasien . '%');
    }

    // Sortir berdasarkan tanggal jika ada
    if ($request->filled('sort_by') && in_array($request->sort_by, ['asc', 'desc'])) {
        $query->orderBy('created_at', $request->sort_by);
    } else {
        $query->orderBy('created_at', 'desc'); // Default sorting
    }
    $riwayat = $query->get();
        return view('admin.hasil.index', [
            'riwayat' => $riwayat
        ]);
    }
}
