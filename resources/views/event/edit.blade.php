@extends('layouts.app')
@section('title', 'Edit Event')
@section('content')
<div class="container">
  <h1>Edit Event</h1>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('event.update', $event) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Judul Event</label>
    <input type="text" name="judul" required maxlength="150"
           value="{{ old('judul', $event->judul_event) }}">

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="3">{{ old('deskripsi', $event->deskripsi) }}</textarea>

    <label>Kategori</label>
    <select name="kategori" required>
      @foreach(['Teknologi', 'Bisnis'] as $k)
        <option value="{{ $k }}" @selected(old('kategori', $event->kategori) === $k)>{{ $k }}</option>
      @endforeach
    </select>

    <label>Silabus</label>
    <textarea name="silabus" rows="4">{{ old('silabus', $event->silabus) }}</textarea>

    <label>Durasi Sesi (menit)</label>
    <input type="number" name="durasi_sesi" min="1" required
           value="{{ old('durasi_sesi', $event->durasi_menit) }}">

    <br><br>
    <button type="submit" class="btn">Update</button>
    <a href="{{ route('event.index') }}" class="btn">Batal</a>
  </form>
</div>
@endsection