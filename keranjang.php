<?php
session_start();

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = isset($_POST['nama']) ? $_POST['nama'] : "";
    $harga_produk = isset($_POST['harga']) ? $_POST['harga'] : "";
    $jumlah_produk = isset($_POST['jumlah']) ? $_POST['jumlah'] : "";
    $total_harga = isset($_POST['total']) ? $_POST['total'] : "";

    // data produk ke session keranjang
    $produk = array(
        'nama' => $nama_produk,
        'harga' => $harga_produk,
        'jumlah' => $jumlah_produk,
        'total' => $total_harga
    );
    array_push($_SESSION['keranjang'], $produk);
}

// Handle delete action
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_index'])) {
    $delete_index = $_GET['delete_index'];
    // Hapus item dari session keranjang berdasarkan indeks
    unset($_SESSION['keranjang'][$delete_index]);
    // Reset kembali indeks array
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
}

// Perhitungan subtotal
$subtotal = 0; 
foreach ($_SESSION['keranjang'] as $item) {
    $subtotal += (int)$item['total']; 
}
?>


<!-- Tampilkan isi keranjang -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


    <style>
table {
    width: 100%; 
    border-collapse: collapse; 
    margin-bottom: 20px; 
}


table,th,td {
    border: 1px solid #ddd; 
    padding: 8px; 
    text-align: center; 
}


th {
    background-color:#8B4513;
    color:#fff; 
}

th,
td {
    padding: 15px; 
    text-align: center; 
}


tr:nth-child(even) {
    background-color: #CD853F; 
}

tr:hover {
    background-color: #fff; 
}

/* Style untuk tombol-tombol aksi */
.action-buttons button {
    margin-right: 5px; 
    cursor: pointer; 
}

/* Style untuk tombol hapus */
.delete-button {
    background-color:#FF0000;
    color: white;
    border: none; 
    padding: 8px 6px;
    text-align: center; 
    text-decoration: none; 
    display: inline-flex; 
    font-size: 14px; 
    border-radius: 4px; 
    transition: background-color 0.3s ease; 
   
}

/* Efek hover pada tombol hapus */
.delete-button:hover {
    background-color: #800000; /* Warna merah lebih gelap saat dihover */
}

/* Style untuk tombol Checkout */
.checkout-button {
    background-color: #00FF00; 
    color: white; 
    border: none; /* Tidak ada border */
    padding: 12px 24px; /* Padding atas dan bawah 12px, kiri dan kanan 24px */
    text-align: center; /* Teks selalu di tengah */
    text-decoration: none; /* Tidak ada dekorasi teks */
    display: inline-block; /* Mengubah tampilan menjadi inline block */
    font-size: 14px; /* Ukuran font 14px */
    border-radius: 4px; /* Membuat sudut border menjadi melengkung */
    transition: background-color 0.3s ease; /* Efek transisi pada perubahan warna latar belakang */
}

/* Efek hover pada tombol Checkout */
.checkout-button:hover {
    background-color: #0056b3; /* Warna biru lebih gelap saat dihover */
}

 /* CSS untuk tombol */
 .button-group a.btn {
        text-decoration: none;
        color: 	#8B4513;
        background-color: none;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        transition: color 0.3s; /* Tambahkan transisi untuk perubahan warna teks */
        display: inline-block;
    }

    /* CSS untuk hover */
    .button-group a.btn:hover {
        color: 	#CD853F; /* Ubah warna teks saat tombol dihover */
    }

    /* CSS untuk gambar ikon */
    .button-group a.btn img {
        width: 30px;
        height: 30px;
        margin-right: 5px;
    }
</style>


</head>
<body>
    <div class="wrapper">
        <div class="content-wrapper"></div>
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-burger"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="menu.php">Masakan Sunda</a>
                </div>
            </div>

            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="menu.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Menu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="keranjang.php" class="sidebar-link">
                        <i class="lni lni-cart"></i>
                        <span>Keranjang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-heart"></i>
                        <span>Favorite</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Article</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-envelope"></i>
                        <span>Pesan</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="index.html" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Keranjang</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        </ul>
                    </div>
            </nav>
            <br>
            
<!-- Tombol Menu Lain -->
<div class="button-group">
    <a href="menu.php" class="btn">
        <img src="img/menu1.png" alt="Menu Lainnya"> Menu Lainnya 
    </a>
</div>


            <!-- Table -->
           
<table id="keranjangTable" style="margin-top: 40px;">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['keranjang'] as $index => $item) { ?>
        <tr>
            <td><?php echo $item['nama']; ?></td>
            <td><?php echo $item['harga']; ?></td>
            <td><?php echo $item['jumlah']; ?></td>
            <td><?php echo $item['total']; ?></td>
            <td>
        
            <!-- Formulir untuk menghapus item -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" style="display: inline;">
                    <input type="hidden" name="delete_index" value="<?php echo $index; ?>">
                    <button type="submit" class="delete-button"><i class="lni lni-garbage"></i>Hapus</button>
                </form>
            </td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>

    <!-- Hitung subtotal -->
  
    <div class="button-group d-flex justify-content-end">
    <form action="checkout.php" method="post">
    <?php 
        $subtotal = 0; 

        foreach ($_SESSION['keranjang'] as $item) {
         $subtotal += (int)$item['total']; 
        }
            ?>
    <input type="submit" value="Checkout" class="btn btn-success" style="margin-left: 50px";>
</form>

    </div>
     </div>
</body>
</html>


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
     <script src="script.js"></script>
</body>
</html>