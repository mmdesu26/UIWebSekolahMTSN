@extends('layouts.app')

@section('content')
<h2>Ekstrakurikuler</h2>

@if ($item)
<div class="card p-3 mb-3">
    <h3>{{ $item['name'] }}</h3>
    <p>Jadwal: {{ $item['jadwal'] }}</p>
    <p>Pembina: {{ $item['pembina'] }}</p>
    <p>Prestasi: {{ $item['prestasi'] }}</p>
</div>
@else
<div class="card p-3 mb-3">
    <p>Ekstrakurikuler tidak ditemukan.</p>
</div>
@endif

<a href="{{ url('/ekstrakurikuler') }}" class="btn btn-secondary">Kembali</a>
@endsection