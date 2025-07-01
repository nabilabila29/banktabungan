<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RekeningRequest;

class RekeningController extends Controller
{
    public function index(Request $request)
    {
        $query = Rekening::with('nasabah');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('nasabah', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by jenis
        if ($request->has('jenis') && $request->jenis != '') {
            $query->where('jenis', $request->jenis);
        }

        // Filter by status (if you have status field)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $rekenings = $query->latest()->paginate(10);
        
        return view('rekening.index', compact('rekenings'));
    }

    public function create()
    {
        $nasabahs = Nasabah::all();
        return view('rekening.create', compact('nasabahs'));
    }

    public function store(RekeningRequest $request)
    {
        DB::beginTransaction();
        try {
            Rekening::create([
                'nasabah_id' => $request->nasabah_id,
                'jenis'      => $request->jenis,
                'setor_awal' => $request->setor_awal,
            ]);

            DB::commit();

            return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $rekening = Rekening::with('nasabah')->findOrFail($id);
        return view('rekening.show', compact('rekening'));
    }

    public function edit($id)
    {
        $rekening = Rekening::with('nasabah')->findOrFail($id);
        $nasabahs = Nasabah::all();
        return view('rekening.edit', compact('rekening', 'nasabahs'));
    }

    public function update(RekeningRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $rekening = Rekening::findOrFail($id);
            $rekening->update([
                'nasabah_id' => $request->nasabah_id,
                'jenis'      => $request->jenis,
                'setor_awal' => $request->setor_awal,
            ]);

            DB::commit();
            return redirect()->route('rekening.index')->with('success', 'Rekening berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $rekening = Rekening::findOrFail($id);
            $rekening->delete();

            DB::commit();
            return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()]);
        }
    }
}