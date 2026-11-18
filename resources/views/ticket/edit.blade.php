@extends('layouts.app')
@section('title', 'Edit Tiket')
@section('content')
<div class="container">
  <h1>Edit Tiket</h1>

  @if($errors->any())
    <div class="alert error"><ul>
      @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
    </ul></div>
  @endif

  <form action="{{ route('ticket.update', $ticket) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Jenis Tiket</label>
    <select name="tipe_tiket" required>
      @foreach(['Early Bird', 'Regular', 'VIP'] as $j)
        <option value="{{ $j }}" @selected(old('tipe_tiket', $ticket->tipe_tiket) === $j)>{{ $j }}</option>
      @endforeach
    </select>

    <label>Harga Tiket (Rp)</label>
    <input type="number" name="harga" min="0" step="1" required
           value="{{ old('harga', (int) $ticket->harga) }}">

    <label>Kuota Tiket</label>
    <input type="number" name="kuota" min="0" step="1" required
           value="{{ old('kuota', $ticket->kuota) }}">

    <label>Benefit Tiket</label>
    <textarea name="benefit" rows="3" required>{{ old('benefit', $ticket->benefit) }}</textarea>

    <div class="aksi-form">
      <a href="{{ route('ticket.index') }}" class="btn">Batal</a>
      <button type="submit">Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection