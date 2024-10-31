@extends('layout.app')

@section('content')
<div class="container">
    <h1>Tambah Makanan</h1>

    <form action="{{ route('makanan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Makanan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
