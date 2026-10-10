<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Tambah Produk Baru</h1>

        <!-- Tampilkan Error Validasi -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Wajib pakai enctype untuk upload file -->
        <form action="{{ route('artikels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="mb-4">
                <label class="block mb-1 font-medium">Judul</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded">{{ old('deskripsi') }}</textarea>
            </div>
            <!-- Input Gambar -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Gambar Produk</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Simpan</button>
        </form>

        <a href="{{ route('products.index') }}" class="block text-center text-sm text-gray-600 mt-4">Kembali</a>
    </div>
</body>
</html>