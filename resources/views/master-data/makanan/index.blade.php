@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="title">Daftar Makanan</h1>
    <a href="{{ route('makanan.create') }}" class="btn btn-primary mb-3">Tambah Makanan</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="makananTable">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach ($makanans as $makanan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $makanan->nama }}</td>
            <td>{{ $makanan->deskripsi }}</td>
            <td>{{ $makanan->harga }}</td>
            <td>
                <a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Animasi untuk judul
        anime({
            targets: '.title',
            translateY: [-20, 20],
            opacity: [0.8, 1],
            duration: 1000,
            easing: 'easeInOutSine',
            direction: 'alternate',
            loop: true
        });

        // Animasi untuk tabel
        anime({
            targets: '#makananTable',
            opacity: [0, 1],       // Memudarkan dari tidak terlihat ke terlihat
            translateY: [50, 0],   // Menggerakkan tabel dari bawah ke posisi aslinya
            duration: 1000,
            easing: 'easeOutExpo'
        });

        // Animasi untuk setiap baris tabel
        const rows = document.querySelectorAll('#makananTable tr:not(:first-child)');
        rows.forEach((row, index) => {
            anime({
                targets: row,
                opacity: [0, 1],
                translateY: [10, 0],
                delay: anime.stagger(100, { start: index * 100 }), // Memberikan delay untuk setiap baris
                duration: 500,
                easing: 'easeOutExpo'
            });
        });
    });
</script>
@endsection
