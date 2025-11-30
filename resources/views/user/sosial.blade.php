@extends('layouts.app')

@section('content')
<h2>Sosial Media</h2>
<div class="row g-3">
    @foreach ($data['sosial'] ?? [] as $s)
    <div class="col-md-6">
        <div class="card p-3 d-flex align-items-center">
            <div class="me-3" style="font-size:24px;">🌐</div>
            <div>
                <strong>{{ $s['name'] }}</strong><br>
                <a href="{{ $s['link'] }}" target="_blank">{{ $s['link'] }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection