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

        <!-- Tampilkan Error Validasi jika ada -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Harga</label>
                <input type="number" name="harga" value="{{ old('harga') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Stok</label>
                <input type="number" name="stok" value="{{ old('stok') }}" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Simpan</button>
        </form>
        <a href="{{ route('products.index') }}" class="block text-center text-sm text-gray-600 mt-4">Kembali</a>
    </div>
</body>
</html>