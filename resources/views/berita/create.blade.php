<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Tambah Berita Baru</h1>

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

        <form action="{{ route('beritas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Simpan</button>
        </form>
        <a href="{{ route('beritas.index') }}" class="block text-center text-sm text-gray-600 mt-4">Kembali</a>
    </div>
</body>
</html>