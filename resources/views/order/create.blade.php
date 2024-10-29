<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Flowbite CDN -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.5/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form action="{{ route('order.store') }}" method="POST" class="bg-white p-6 m-6 rounded-lg shadow-lg w-full max-w-lg space-y-4">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">be-benz ticket form</h2>

        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="nama" name="nama" required class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="nomer_whatsapp" class="block mb-2 text-sm font-medium text-gray-700">Nomer WhatsApp:</label>
            <input type="text" id="nomer_whatsapp" name="nomer_whatsapp" required class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" required class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="price_range" class="block mb-2 text-sm font-medium text-gray-700">Price Range:</label>
            <select id="price_range" name="price_range" required class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="800000">VIP - 800000 Rupiah</option>
                <option value="350000">Festival - 350000 Rupiah</option>
                <option value="150000">Reguler - 150000 Rupiah</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-medium text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Submit
        </button>
    </form>

</body>
</html>
