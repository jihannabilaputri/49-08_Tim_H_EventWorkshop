<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    private function aturan($id = null): array
    {
        return [
            'nama'   => 'required|string|max:100',
            'kampus' => 'required|string|max:150',
            'prodi'  => 'required|string|max:100',
            'kontak' => ['required', 'regex:/^[0-9]{10,15}$/'],
            'email'  => 'required|email|unique:pesertas,email' . ($id ? ",$id" : ''),
        ];
    }

    public function index()
    {
        $peserta = Peserta::orderByDesc('id')->get();
        return view('peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        Peserta::create($request->validate($this->aturan()));
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil disimpan.');
    }

    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $peserta->update($request->validate($this->aturan($peserta->id)));
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}