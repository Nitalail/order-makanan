<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
 
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        </ul>
                    </div>
            </nav>


            <!-- Card Produk -->
            <?php
            // Mulai session
            session_start();

            // Array produk
            $produk = array(
                array(
                    "id" => 1,
                    "nama" => "Ayam Geprek",
                    "harga" => 10000,
                    "gambar" => "img/ayam geprek.jpg"
                ),
                array(
                    "id" => 2,
                    "nama" => "Nasi Goreng",
                    "harga" => 15000,
                    "gambar" => "img/nasi goreng.jpg"
                ),
                array(
                    "id" => 3,
                    "nama" => "Nasi Kuning",
                    "harga" => 8000,
                    "gambar" => "img/nasi kuning.jpg"
                ),
                array(
                    "id" => 4,
                    "nama" => "Sate Ayam",
                    "harga" => 25000,
                    "gambar" => "img/sate ayam.jpg"
                ),
                array(
                    "id" => 5,
                    "nama" => "Sayur Asem",
                    "harga" => 7000,
                    "gambar" => "img/sayur asem.jpg"
                ),
                array(
                    "id" => 6,
                    "nama" => "Semur Jengkol",
                    "harga" => 15000,
                    "gambar" => "img/semur jengkol.jpg"
                ),
                array(
                    "id" => 7,
                    "nama" => "Es Teh Lemon",
                    "harga" => 9000,
                    "gambar" => "img/es teh lemon.jpg"
                ),
                array(
                    "id" => 8,
                    "nama" => "Tempe Mendoan",
                    "harga" => 2000,
                    "gambar" => "img/tempe mendoan.jpg"
                )
            );
            ?>
<br>
            <!-- Card Produk -->
            <div class="container mt-4">
                <div class="row">
                    <?php foreach ($produk as $item) { ?>
                        <div class="col-sm-6 col-lg-3 col-md-4">
                            <div class="card">
                                <img src="<?php echo $item['gambar']; ?>" alt="Product Image" class="product-image">
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <?php echo $item['nama']; ?>
                                    </h5>
                                    <p class="product-price">
                                        Rp
                                        <?php echo $item['harga']; ?>
                                    </p>
                                    <p hidden>
                                        <?php echo $item['id']; ?>
                                    </p>
                                    <div class="product-actions">
                                        <!-- Button untuk menampilkan modal -->
                                        <button class="btn-transaction" type="button" data-bs-toggle="modal"
                                            data-bs-target="#purchaseModal<?php echo $item['id']; ?>">
                                            <i class="lni lni-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Modal -->
            <?php foreach ($produk as $item) { ?>
                <div class="modal fade" id="purchaseModal<?php echo $item['id']; ?>" tabindex="-1"
                    aria-labelledby="purchaseModalLabel<?php echo $item['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="purchaseModalLabel<?php echo $item['id']; ?>">Form Pembelian
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Isi form pembelian disini -->
                                <form method="post" action="keranjang.php">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Produk:</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="<?php echo $item['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga:</label>
                                        <input type="text" class="form-control" name="harga"
                                            value="Rp<?php echo $item['harga']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah<?php echo $item['id']; ?>" class="form-label">Jumlah:</label>
                                        <input type="number" class="form-control jumlah" name="jumlah"
                                            id="jumlah<?php echo $item['id']; ?>" data-id="<?php echo $item['id']; ?>"
                                            placeholder="Masukkan jumlah pembelian">
                                    </div>
                                    <div class="mb-3">
                                        <label for="total<?php echo $item['id']; ?>" class="form-label">Total:</label>
                                        <input type="text" class="form-control total" name="total"
                                            id="total<?php echo $item['id']; ?>" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Keranjang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <!-- JavaScript -->
            <script src="script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                // Ambil semua elemen input jumlah dan total
                const jumlahInputs = document.querySelectorAll('.jumlah');
                const totalInputs = document.querySelectorAll('.total');

                // Tambahkan event listener untuk setiap input jumlah
                jumlahInputs.forEach(input => {
                    input.addEventListener('input', function () {
                        const id = input.getAttribute('data-id'); // Ambil id produk
                        const harga = <?php echo json_encode($produk); ?>.find(item => item.id == id).harga; // Ambil harga berdasarkan id
                        const jumlah = parseInt(input.value); // Ambil jumlah pembelian dari input

                        const total = harga * jumlah; // Hitung total

                        // Masukkan total ke input total yang sesuai
                        document.getElementById(`total${id}`).value = 'Rp' + total.toLocaleString('id-ID');
                    });
                });

            </script>

</body>

</html>