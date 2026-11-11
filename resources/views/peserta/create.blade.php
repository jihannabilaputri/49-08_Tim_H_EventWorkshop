@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Form Biodata Peserta</h1>
  <p class="sub">Event &amp; Workshop</p>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('peserta.store') }}" method="POST">
    @csrf
    <label>Nama Lengkap</label>
    <input type="text" name="nama" value="{{ old('nama') }}" required>
    <label>Asal Kampus</label>
    <input type="text" name="kampus" value="{{ old('kampus') }}" required>
    <label>Program Studi</label>
    <input type="text" name="prodi" value="{{ old('prodi') }}" required>
    <label>Nomor Kontak</label>
    <input type="tel" name="kontak" value="{{ old('kontak') }}" required>
    <label>Email Aktif</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <div class="aksi-form">
      <a href="{{ route('peserta.index') }}" class="btn">Batal</a>
      <button type="submit">Daftar</button>
    </div>
  </form>
</div>
@endsection