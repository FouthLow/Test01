<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Artikel</title>
    <!-- Bisa pakai Tailwind CSS / Bootstrap -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Daftar Artikel</h1>

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('artikels.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">+ Tambah Produk</a>

        <table class="w-full border-collapse border border-gray-300 mt-2">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Gambar</th>
                    <th class="border border-gray-300 p-2">Nama</th>
                    <th class="border border-gray-300 p-2">Deskripsi</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikels as $artikel)
                <tr>
                    <td class="border border-gray-300 p-2 text-center">
                        @if($artikel->image)
                            <img src="{{ asset('storage/' . $artikel->image) }}" alt="Foto Produk" class="w-12 h-12 object-cover mx-auto rounded">
                        @else
                            <span class="text-xs text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>

                    <td class="border border-gray-300 p-2">{{ $artikel->nama }}</td>
                    <td class="border border-gray-300 p-2">{{ $artikel->deskripsi }}</td>
                    <td class="border border-gray-300 p-2 text-center">
                        <a href="{{ route('artikels.edit', $artikel) }}" class="text-yellow-600 mr-2">Edit</a>
                        
                        <!-- Tombol Hapus wajib pakai Form DELETE -->
                        <form action="{{ route('artikels.destroy', $artikel) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">Belum ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>