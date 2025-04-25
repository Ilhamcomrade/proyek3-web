<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Warung Tikungan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .kategori-btn.active {
            background-color: #000000;
            color: #000000;
        }

       /* Atur header agar penuh */
.header {
    background-color: #0077B6; /* Warna biru tua */
    color: white;
    width: 100%; /* Pastikan selebar layar */
    position: relative; /* Pastikan tidak ada elemen lain yang menimpa */
    margin: 0; /* Hilangkan margin di kiri/kanan */
    padding: 40px 0; /* Tambahkan padding atas dan bawah */
    box-sizing: border-box; /* Pastikan padding tidak memengaruhi lebar */
}
body {
    margin: 0; /* Pastikan tidak ada margin di body */
    padding: 0;
}



.categories {
  margin-left: 0; /* Tetapkan sejajar dengan batas kiri */
  font-size: 16px; /* Contoh styling tambahan */
}

.search-menu {
  flex: 1; /* Membuat elemen input berkembang sesuai ruang yang tersedia */
  margin: 0 20px; /* Memberikan jarak horizontal antara kategori dan ikon keranjang */
}

.cart-icon {
  margin-right: 0; /* Tetapkan sejajar dengan batas kanan */
  font-size: 20px; /* Contoh styling tambahan untuk ikon keranjang */
}

.kategori-wrapper {
    display: flex;
    justify-content: space-between; /* Membuat jarak antar kategori merata */
    align-items: center;
    gap: 15px; /* Menambahkan ruang horizontal antar kategori */
}

.kategori-item {
    flex-grow: 1; /* Membuat tombol fleksibel */
    text-align: center; /* Memastikan teks berada di tengah */
    min-width: 150px; /* Perbesar lebar minimum tombol */
    padding: 10px 20px; /* Tambahkan padding untuk membuat tombol lebih tinggi dan lebar */
}

.cart-wrapper {
    margin-left: auto; /* Menempatkan ikon keranjang sejauh mungkin ke kanan */
}
    </style>
</head>
<body class="bg-light">
    @yield('content')

    {{-- Optional: Bootstrap JS if needed --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
