@extends('layouts.app')
@section('title', 'Tambah Event')
@section('content')
<div class="container">
  <h1>Tambah Event</h1>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('event.store') }}" method="POST">
    @csrf

    <label>Judul Event</label>
    <input type="text" name="judul" required maxlength="150" value="{{ old('judul') }}">

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>

    <label>Kategori</label>
    <select name="kategori" required>
      <option value="Teknologi" @selected(old('kategori') === 'Teknologi')>Teknologi</option>
      <option value="Bisnis" @selected(old('kategori') === 'Bisnis')>Bisnis</option>
    </select>

    <label>Silabus</label>
    <textarea name="silabus" rows="4">{{ old('silabus') }}</textarea>

    <label>Durasi Sesi (menit)</label>
    <input type="number" name="durasi_sesi" min="1" required value="{{ old('durasi_sesi') }}">

    <br><br>
    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('event.index') }}" class="btn">Batal</a>
  </form>
</div>
@endsection