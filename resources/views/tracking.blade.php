<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-1/2 bg-white p-8 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Cek Status Barang</h1>
        <form action="/track" method="POST">
            @csrf
            <input type="text" name="No_resi" class="border p-2 w-full mb-2" placeholder="Masukkan No Resi" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cek</button>
        </form>

        @if(isset($tracking))
            <div class="mt-4 p-4 border rounded bg-gray-50">
                <p><strong>Nama Barang:</strong> {{ $tracking->Nama_barang }}</p>
                <p><strong>No Resi:</strong> {{ $tracking->No_resi }}</p>
                <p><strong>Status:</strong> 
                    <span class="px-2 py-1 rounded 
                        {{ $tracking->status == 'Done' ? 'bg-green-500 text-white' : 
                           ($tracking->status == 'Proses' ? 'bg-yellow-500 text-white' : 'bg-red-500 text-white') }}">
                        {{ $tracking->status }}
                    </span>
                </p>
                <p><strong>Jumlah Barang:</strong> {{ $tracking->quantity }}</p>
                <p><strong>Alamat Pesanan:</strong> {{ $tracking->location }}</p>
            </div>
        @endif
    </div>
</body>
</html>
