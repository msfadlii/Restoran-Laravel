@extends('layout.app')

@section('content')
<div class="container">
    <h1>Detail Makanan</h1>
    <p><strong>Nama:</strong> {{ $makanan->nama }}</p>
    <p><strong>Deskripsi:</strong> {{ $makanan->deskripsi }}</p>
    <p><strong>Harga:</strong> {{ $makanan->harga }}</p>
    <a href="{{ route('makanan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
