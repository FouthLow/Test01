<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Edit Produk</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Method wajib PUT dan action mengarah ke update dengan parameter $product -->
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-yellow-600 text-white p-2 rounded">Perbarui</button>
        </form>
        <a href="{{ route('products.index') }}" class="block text-center text-sm text-gray-600 mt-4">Kembali</a>
    </div>
</body>
</html>