@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Edit Peserta</h1>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('peserta.update', $peserta) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Lengkap</label>
    <input type="text" name="nama" value="{{ old('nama', $peserta->nama) }}" required>
    <label>Asal Kampus</label>
    <input type="text" name="kampus" value="{{ old('kampus', $peserta->kampus) }}" required>
    <label>Program Studi</label>
    <input type="text" name="prodi" value="{{ old('prodi', $peserta->prodi) }}" required>
    <label>Nomor Kontak</label>
    <input type="tel" name="kontak" value="{{ old('kontak', $peserta->kontak) }}" required>
    <label>Email Aktif</label>
    <input type="email" name="email" value="{{ old('email', $peserta->email) }}" required>

    <div class="aksi-form">
      <a href="{{ route('peserta.index') }}" class="btn">Batal</a>
      <button type="submit">Simpan</button>
    </div>
  </form>
</div>
@endsection