@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Makanan</h1>

    <form action="{{ route('makanan.update', $makanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Makanan</label>
            <input type="text" name="nama" class="form-control" value="{{ $makanan->nama }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $makanan->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $makanan->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
