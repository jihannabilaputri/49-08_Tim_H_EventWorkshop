@extends('layouts.app')
@section('title', 'Modul Event')
@section('content')
<div class="container lebar">
  <h1>Modul Master Event</h1>
  <p class="sub">Kelola data event &amp; workshop</p>

  @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
    <div class="alert error">{{ session('error') }}</div>
  @endif

  <table>
    <tr>
      <th>No</th><th>Judul</th><th>Kategori</th><th>Durasi</th><th>Silabus</th><th>Aksi</th>
    </tr>
    @forelse($events as $e)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>
        <strong>{{ $e->judul_event }}</strong><br>
        <small>{!! nl2br(e($e->deskripsi)) !!}</small>
      </td>
      <td>{{ $e->kategori }}</td>
      <td>{{ $e->durasi_menit }} menit</td>
      <td>{!! nl2br(e($e->silabus)) !!}</td>
      <td>
        <div class="aksi">
          <a href="{{ route('event.edit', $e) }}" class="btn btn-kecil">Edit</a>
          <form action="{{ route('event.destroy', $e) }}" method="POST"
                onsubmit="return confirm('Yakin hapus event ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-kecil btn-hapus" style="margin-top:0">Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" style="text-align:center">Belum ada data event.</td></tr>
    @endforelse
  </table>

  <div class="aksi-form">
    <a href="{{ route('event.create') }}" class="btn">Tambah Event</a>
    <a href="{{ url('/') }}" class="btn">Menu Utama</a>
  </div>
</div>
@endsection