@extends('layouts.app')

@section('content')
<div class="card p-3 mb-3">
    <h3>Sejarah Sekolah</h3>
    <p>{{ $data['sejarah'] }}</p>
</div>
@endsection