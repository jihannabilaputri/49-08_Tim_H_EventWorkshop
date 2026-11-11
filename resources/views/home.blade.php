@extends('layouts.app')
@section('content')
<div class="container" style="text-align:center">
  <h1>Sistem Pengelolaan<br>Event &amp; Workshop</h1>
  <a href="{{ route('event.index') }}" class="btn" style="display:block;margin-top:14px">Event</a>
  <a href="#" class="btn" style="display:block;margin-top:14px">Speaker</a>
  <a href="#" class="btn" style="display:block;margin-top:14px">Ticket</a>
  <a href="{{ route('peserta.index') }}" class="btn" style="display:block;margin-top:14px">Participant</a>
</div>
@endsection