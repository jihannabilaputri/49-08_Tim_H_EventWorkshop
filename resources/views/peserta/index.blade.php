@extends('layouts.app')
@section('content')
<div class="container lebar">
  <h1>Daftar Peserta</h1>

  @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
  @endif

  <table>
    <tr><th>No</th><th>Nama</th><th>Kampus</th><th>Prodi</th><th>Kontak</th><th>Email</th><th>Aksi</th></tr>
    @forelse($peserta as $p)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $p->nama }}</td>
      <td>{{ $p->kampus }}</td>
      <td>{{ $p->prodi }}</td>
      <td>{{ $p->kontak }}</td>
      <td>{{ $p->email }}</td>
      <td>
        <div class="aksi">
          <a href="{{ route('peserta.edit', $p) }}" class="btn btn-kecil">Edit</a>
          <form action="{{ route('peserta.destroy', $p) }}" method="POST"
                onsubmit="return confirm('Yakin hapus?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-kecil btn-hapus" style="margin-top:0">Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr><td colspan="7" style="text-align:center">Belum ada data peserta.</td></tr>
    @endforelse
  </table>

  <div class="aksi-form">
    <a href="{{ route('peserta.create') }}" class="btn">+ Tambah Peserta</a>
    <a href="{{ url('/') }}" class="btn">Menu Utama</a>
  </div>
</div>
@endsection