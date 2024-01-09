<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitungan Pemasukan Toko</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
            color: #333; /* Warna teks */
        }

        h2 {
            color: #4CAF50; /* Warna hijau */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #hasil {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php

// Fungsi untuk menghitung total pemasukan berdasarkan harga barang dan jumlah pembelian
function hitungPemasukan($hargaBarang, $jumlahPembelian) {
    return $hargaBarang * $jumlahPembelian;
}

// Memeriksa apakah formulir sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai input dari formulir
    $namaBarang = $_POST["nama_barang"];
    $hargaBarang = $_POST["harga_barang"];
    $jumlahPembelian = $_POST["jumlah_pembelian"];

    // Menghitung total pemasukan
    $totalPemasukan = hitungPemasukan($hargaBarang, $jumlahPembelian);

    // Menentukan diskon berdasarkan total pemasukan
    $diskon = 0;
    if ($totalPemasukan >= 50000000) {
        $diskon = 0.1; // Diskon 10% untuk pembelian di atas atau sama dengan 50 juta
    }

    // Menghitung total pembayaran setelah diskon
    $totalPembayaran = $totalPemasukan - ($totalPemasukan * $diskon);

    // Menampilkan hasil
    echo "<div id='hasil'>";
    echo "<h2>Hasil Penghitungan</h2>";
    echo "Nama Barang: $namaBarang <br>";
    echo "Harga Barang: Rp " . number_format($hargaBarang, 0, ',', '.') . "<br>";
    echo "Jumlah Pembelian: $jumlahPembelian <br>";
    echo "Total Pemasukan: Rp " . number_format($totalPemasukan, 0, ',', '.') . "<br>";
    echo "Diskon: " . ($diskon * 100) . "% <br>";
    echo "Total Pembayaran setelah Diskon: Rp " . number_format($totalPembayaran, 0, ',', '.');
    echo "</div>";
}

?>

<h2 style="color: #4CAF50;">Formulir Penghitungan Pemasukan Toko</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required >

    <label for="harga_barang">Harga Barang (Rp):</label>
    <input type="number" name="harga_barang" required>

    <label for="jumlah_pembelian">Jumlah Pembelian:</label>
    <input type="number" name="jumlah_pembelian" required>

    <input type="submit" value="Hitung">
</form>

</body>
</html>
