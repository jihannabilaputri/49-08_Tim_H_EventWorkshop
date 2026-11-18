@extends('layouts.app')
@section('title', 'Tambah Tiket')
@section('content')
<div class="container">
  <h1>Tambah Tiket</h1>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('ticket.store') }}" method="POST">
    @csrf

    <label>Jenis Tiket</label>
    <select name="tipe_tiket" required>
      <option value="">-- Pilih jenis tiket --</option>
      @foreach(['Early Bird', 'Regular', 'VIP'] as $j)
        <option value="{{ $j }}" @selected(old('tipe_tiket') === $j)>{{ $j }}</option>
      @endforeach
    </select>

    <label>Harga Tiket (Rp)</label>
    <input type="number" name="harga" min="0" step="1" required
           placeholder="Contoh: 250000" value="{{ old('harga') }}">

    <label>Kuota Tiket</label>
    <input type="number" name="kuota" min="0" step="1" required
           placeholder="Contoh: 100" value="{{ old('kuota') }}">

    <label>Benefit Tiket</label>
    <textarea name="benefit" rows="3" required
              placeholder="Contoh: Sertifikat, snack, merchandise">{{ old('benefit') }}</textarea>

    <div class="aksi-form">
      <a href="{{ route('ticket.index') }}" class="btn">Batal</a>
      <button type="submit">Tambah Tiket</button>
    </div>
  </form>
</div>
@endsection