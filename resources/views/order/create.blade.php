<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div>
            <label for="NIK">NIK:</label>
            <input type="text" id="NIK" name="NIK" required>
        </div>
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <div>
            <label for="nomer_whatsapp">Nomer WhatsApp:</label>
            <input type="text" id="nomer_whatsapp" name="nomer_whatsapp" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="price_range">Price Range:</label>
            <select id="price_range" name="price_range" required>
                <option value="800000">VIP - 800000 Rupiah</option>
                <option value="350000">Festival - 350000 Rupiah</option>
                <option value="150000">Reguler - 150000 Rupiah</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
