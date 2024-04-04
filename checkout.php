<?php
// Mulai session
session_start();

$subtotal = 0;

if (isset($_SESSION['keranjang']) && is_array($_SESSION['keranjang'])) {

    foreach ($_SESSION['keranjang'] as $item) {
        // Hilangkan karakter non-numerik dari harga dan total, kemudian ubah menjadi numerik
        $harga = intval(preg_replace('/[^0-9]/', '', $item['harga']));
        $total = intval(preg_replace('/[^0-9]/', '', $item['total']));

        // Tambahkan harga dari setiap item ke subtotal
        $subtotal += $total;
    }
} else {
    $subtotal = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        
       /* Tambahkan gaya CSS khusus untuk halaman Checkout di sini */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Gunakan min-height agar konten tetap terlihat di layar kecil */
    margin: 0;
    background-color: #F0E68C;
}

.wrapper {
    max-width: 80%; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
    width: 80%; /* Biarkan lebar menjadi 90% agar konten tetap berada di tengah */
    overflow-x: auto; /* Tambahkan overflow-x agar tabel dapat di-scroll jika terlalu lebar */
    padding: 20px;
    box-sizing: border-box;
    background-color: #fff; /* Ubah warna background wrapper */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    overflow-x: auto; /* Tambahkan overflow-x agar tabel dapat di-scroll jika terlalu lebar */
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #CD853F;
    color: #fff;
}

.alert {
    padding: 10px 15px;
    max-width: 100%;
    margin: 0 auto;
    font-size: 16px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
}

.button-group {
    margin-top: 20px;
}


    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="main p-3">
                <h2 class="text-center">Struk Pembelian</h2>
                <br>
                <!-- Instruksi setelah pembayaran -->
                <div class="alert alert-success" role="alert">
                    Pembayaran berhasil dilakukan. Terima kasih telah berbelanja!
                </div>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['keranjang'] as $item) { ?>
                            <tr>
                                <td><?php echo $item['nama']; ?></td>
                                <td><?php echo $item['harga']; ?></td>
                                <td><?php echo $item['jumlah']; ?></td>
                                <td><?php echo $item['total']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="right"><strong>Sub Total:</strong></td>
                            <td><strong>Rp.<?php echo number_format($subtotal, 2,',','.'); ?></strong></td>

                        </tr>
                    </tbody>
                </table>
                
                <div class="button-group d-flex justify-content-end" style="margin-bottom: 50px;">
    <a href="keranjang.php" class="btn btn-primary btn-lg" style="margin-right: 10px;">
        <i class="lni lni-cart"></i>
    </a>
    <a href="menu.php" class="btn btn-success btn-lg">
        <i class="lni lni-grid-alt"></i> 
    </a>
</div>


            </div>
        </div>
    </div>
</body>

</html>
