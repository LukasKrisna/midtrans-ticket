<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('assets/Asset-15.png') no-repeat center center fixed;
            background-size: cover;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 0.5rem;
            padding: 2rem;
        }
        .primary-button {
            background-color: #ffc800;
            color: white;
        }
        .primary-button:hover {
            background-color: #e6b300;
        }
        .form-input, .form-select {
            border-color: #ffc800;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto form-container shadow-md mt-10 max-w-2xl p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Order Form</h2>
        <form action="{{ route('order.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            <div>
                <label for="nama" class="block text-gray-800 font-medium mb-2">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required class="form-input w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            <div>
                <label for="nik" class="block text-gray-800 font-medium mb-2">NIK:</label>
                <input type="text" id="nik" name="nik" required class="form-input w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            <div>
                <label for="gender" class="block text-gray-800 font-medium mb-2">Gender:</label>
                <select id="gender" name="gender" required class="form-select w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="alamat" class="block text-gray-800 font-medium mb-2">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required class="form-input w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            <div>
                <label for="nomer_whatsapp" class="block text-gray-800 font-medium mb-2">Nomer WhatsApp:</label>
                <input type="text" id="nomer_whatsapp" name="nomer_whatsapp" required class="form-input w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            <div>
                <label for="email" class="block text-gray-800 font-medium mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="form-input w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            <div class="md:col-span-2">
                <label for="price_range" class="block text-gray-800 font-medium mb-2">Package:</label>
                <select id="price_range" name="price_range" required class="form-select w-full px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="800000">VIP - 800000 Rupiah</option>
                    <option value="350000">Festival - 350000 Rupiah</option>
                    <option value="150000">Reguler - 150000 Rupiah</option>
                </select>
            </div>
            <button type="submit" class="primary-button w-full md:col-span-2 font-bold py-2 px-4 rounded-lg hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 mt-4">
                Submit
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
