<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private function aturan(): array
    {
        return [
            'judul'       => 'required|string|max:150',
            'deskripsi'   => 'nullable|string',
            'kategori'    => 'required|in:Teknologi,Bisnis',
            'silabus'     => 'nullable|string',
            'durasi_sesi' => 'required|integer|min:1',
        ];
    }

    // Petakan nama field form ke nama kolom database
    private function petakan(array $data): array
    {
        return [
            'judul_event'  => $data['judul'],
            'deskripsi'    => $data['deskripsi'] ?? null,
            'kategori'     => $data['kategori'],
            'silabus'      => $data['silabus'] ?? null,
            'durasi_menit' => $data['durasi_sesi'],
        ];
    }

    public function index()
    {
        $events = Event::orderByDesc('id')->get();
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturan());
        Event::create($this->petakan($data));
        return redirect()->route('event.index')
            ->with('success', 'Data event berhasil disimpan.');
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate($this->aturan());
        $event->update($this->petakan($data));
        return redirect()->route('event.index')
            ->with('success', 'Data event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        try {
            $event->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('event.index')
                ->with('error', 'Event tidak bisa dihapus karena masih dipakai data lain.');
        }

        return redirect()->route('event.index')
            ->with('success', 'Data event berhasil dihapus.');
    }
}