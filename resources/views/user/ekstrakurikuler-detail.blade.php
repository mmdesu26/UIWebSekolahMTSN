@extends('layouts.app')

@section('title', $ekstra->name . ' - MTsN 1 Magetan')

@section('content')
<section class="ekstra-detail">
    <div class="container">
        <h1>{{ $ekstra->name }}</h1>
        <p><strong>Jadwal:</strong> {{ $ekstra->jadwal }}</p>
        <p><strong>Pembina:</strong> {{ $ekstra->pembina }}</p>
        <p><strong>Prestasi:</strong> {!! nl2br(e($ekstra->prestasi)) !!}</p>
    </div>
</section>

<!-- Link to the external CSS file -->
<link rel="stylesheet" href="{{ asset('css/ekstra-detail.css') }}">
@endsection