<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Http\Requests\NasabahRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Nasabah::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status (if you have status field)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $nasabahs = $query->latest()->paginate(10);

        return view('nasabah.index', compact('nasabahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NasabahRequest $request)
    {
        DB::beginTransaction();
        
        try {
            Nasabah::create($request->validated());
            
            DB::commit();
            
            return redirect()
                ->route('nasabah.index')
                ->with('success', 'Data nasabah berhasil ditambahkan.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nasabah $nasabah)
    {
        return view('nasabah.show', compact('nasabah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nasabah $nasabah)
    {
        return view('nasabah.edit', compact('nasabah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NasabahRequest $request, Nasabah $nasabah)
    {
        DB::beginTransaction();
        
        try {
            $nasabah->update($request->validated());
            
            DB::commit();
            
            return redirect()
                ->route('nasabah.index')
                ->with('success', 'Data nasabah berhasil diperbarui.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nasabah $nasabah)
    {
        DB::beginTransaction();
        try {
            // Hapus rekening jika ada
            if ($nasabah->rekening) {
                $nasabah->rekening->delete();
            }
            $nasabah->delete();
            DB::commit();
            return redirect()
                ->route('nasabah.index')
                ->with('success', 'Data nasabah (dan rekening terkait) berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Custom: Halaman beranda utama
     */
    public function beranda()
    {
        $totalNasabah = \App\Models\Nasabah::count();
        $totalRekening = \App\Models\Rekening::count();
        $totalPinjaman = 2000; // Ganti dengan query jika ada tabel pinjaman
        $totalCabang = 1000;   // Ganti dengan query jika ada tabel cabang

        return view('beranda', compact('totalNasabah', 'totalRekening', 'totalPinjaman', 'totalCabang'));
    }
}
