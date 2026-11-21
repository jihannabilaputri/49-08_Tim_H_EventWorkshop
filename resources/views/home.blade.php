@extends('layouts.app')
@section('title', 'Menu Utama')
@section('content')

<form action="{{ route('logout') }}" method="POST"
      style="position:absolute;top:20px;right:20px;margin:0">
  @csrf
  <button type="submit" class="btn btn-hapus btn-kecil">Logout</button>
</form>

<div class="container" style="text-align:center">
  <h1>Sistem Pengelolaan<br>Event &amp; Workshop</h1>

  <a href="{{ route('event.index') }}" class="btn" style="display:block;margin-top:14px">Event</a>
  <a href="{{ route('speaker.index') }}" class="btn" style="display:block;margin-top:14px">Speaker</a>
  <a href="{{ route('ticket.index') }}" class="btn" style="display:block;margin-top:14px">Ticket</a>
  <a href="{{ route('peserta.index') }}" class="btn" style="display:block;margin-top:14px">Participant</a>
</div>
@endsection