@extends('layouts.app')
@section('title', 'Modul Tiket')
@section('content')
<div class="container lebar">
  <h1>Manajemen Tiket</h1>
  <p class="sub">Kelola jenis tiket, harga, kuota, dan benefit event.</p>

  @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
  @endif

  <form method="GET" action="{{ route('ticket.index') }}" style="display:flex;gap:8px;align-items:center">
    <input type="text" name="cari" placeholder="Cari jenis tiket atau benefit"
           value="{{ $cari }}" style="flex:1">
    <button type="submit" class="btn" style="margin-top:0">Cari</button>
    @if($cari !== '')
      <a href="{{ route('ticket.index') }}" class="btn" style="margin-top:0">Reset</a>
    @endif
  </form>

  <table>
    <tr>
      <th>No</th><th>Jenis Tiket</th><th>Harga</th><th>Kuota</th><th>Benefit</th><th>Aksi</th>
    </tr>
    @forelse($tickets as $t)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td><strong>{{ $t->tipe_tiket }}</strong></td>
      <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
      <td>{{ number_format($t->kuota, 0, ',', '.') }}</td>
      <td>{!! nl2br(e($t->benefit)) !!}</td>
      <td>
        <div class="aksi">
          <a href="{{ route('ticket.edit', $t) }}" class="btn btn-kecil">Edit</a>
          <form action="{{ route('ticket.destroy', $t) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-kecil btn-hapus" style="margin-top:0">Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" style="text-align:center">Belum ada data tiket.</td></tr>
    @endforelse
  </table>

  <div class="aksi-form">
    <a href="{{ route('ticket.create') }}" class="btn">+ Tambah Tiket</a>
    <a href="{{ url('/') }}" class="btn">Menu Utama</a>
  </div>
</div>
@endsection