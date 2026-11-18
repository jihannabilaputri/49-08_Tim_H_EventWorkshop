<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private function aturan(): array
    {
        return [
            'tipe_tiket' => 'required|in:Early Bird,Regular,VIP',
            'harga'      => 'required|numeric|min:0',
            'kuota'      => 'required|integer|min:0',
            'benefit'    => 'required|string',
        ];
    }

    public function index(Request $request)
    {
        $cari = trim($request->query('cari', ''));

        $tickets = Ticket::query()
            ->when($cari !== '', function ($q) use ($cari) {
                $q->where('tipe_tiket', 'like', "%{$cari}%")
                  ->orWhere('benefit', 'like', "%{$cari}%");
            })
            ->orderByDesc('id')
            ->get();

        return view('ticket.index', compact('tickets', 'cari'));
    }

    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        Ticket::create($request->validate($this->aturan()));
        return redirect()->route('ticket.index')
            ->with('success', 'Data tiket berhasil ditambahkan.');
    }

    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->validate($this->aturan()));
        return redirect()->route('ticket.index')
            ->with('success', 'Data tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index')
            ->with('success', 'Data tiket berhasil dihapus.');
    }
}