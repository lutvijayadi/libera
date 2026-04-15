<?php
include '../../config/koneksi.php';

// buku terbaru (id terbesar)
$buku_baru = mysqli_query($koneksi, "
    SELECT * FROM buku 
    ORDER BY id_buku DESC 
    LIMIT 4
");

// buku koleksi umum (stok terbanyak)
$buku_umum = mysqli_query($koneksi, "
    SELECT * FROM buku 
    ORDER BY stok DESC 
    LIMIT 4
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libera</title>
    <link rel="stylesheet" href="../../public/src/output.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-gray-950 text-white">

    <!-- NAVBAR -->
    <div class="max-w-7xl mx-auto px-6">
        <nav class="flex justify-between items-center py-5">

            <img src="../img/logo.png" class="h-14">

            <ul class="hidden lg:flex gap-10 text-gray-300 font-medium text-sm items-center">
                <li><a href="#beranda" class="hover:text-blue-400">Beranda</a></li>
                <li><a href="#rekomendasi" class="hover:text-blue-400">Rekomendasi</a></li>
                <li><a href="#layanan" class="hover:text-blue-400">Layanan</a></li>
                <li><a href="#Tentang" class="hover:text-blue-400">Tentang</a></li>
            </ul>

            <a href="../../auth/login.php"
                class="hidden lg:block bg-blue-600 px-5 py-2 rounded-full hover:bg-blue-700 text-sm">
                Log in
            </a>
        </nav>
    </div>

    <!-- HERO -->
    <section id="beranda"
        class="relative bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-cover bg-center h-screen flex items-center">

        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Perpustakaan Digital Libera
            </h1>

            <p class="text-gray-300 text-lg lg:text-xl mb-8">
                Sistem peminjaman buku modern untuk memudahkan siswa 
                meminjam buku secara cepat, efisien, dan real-time.
            </p>

            <div class="flex justify-center gap-4">
                <a href="#layanan"
                    class="bg-blue-600 px-6 py-3 rounded-lg hover:bg-blue-700">
                    Jelajahi
                </a>

                <a href="#tentang"
                    class="border border-gray-400 px-6 py-3 rounded-lg hover:bg-gray-800">
                    Tentang
                </a>
            </div>
        </div>
    </section>
    <section id="rekomendasi" class="py-24 bg-gray-900">

    <div class="max-w-7xl mx-auto px-6">

        <!-- TITLE -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-3">Rekomendasi Buku</h2>
            <p class="text-gray-400 text-lg">
                Buku terbaru dan koleksi terbaik untuk kamu baca
            </p>
        </div>

        <!-- BUKU BARU -->
        <div class="mb-16">
            <h3 class="text-2xl font-semibold mb-6 text-blue-400">Buku Terbaru</h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php while($b = mysqli_fetch_assoc($buku_baru)) { ?>
                    <div class="bg-gray-950 rounded-2xl overflow-hidden border border-gray-800 hover:border-blue-500 transition">

                        <img src="../../uploads/<?= $b['cover']; ?>" class="w-full h-56 object-cover">

                        <div class="p-4">
                            <h4 class="font-semibold text-lg line-clamp-2">
                                <?= $b['judul_buku']; ?>
                            </h4>
                            <p class="text-gray-400 text-sm mt-1">
                                <?= $b['pengarang']; ?>
                            </p>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- KOLEKSI UMUM -->
        <div>
            <h3 class="text-2xl font-semibold mb-6 text-green-400">Koleksi Populer</h3>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php while($b = mysqli_fetch_assoc($buku_umum)) { ?>
                    <div class="bg-gray-950 rounded-2xl overflow-hidden border border-gray-800 hover:border-green-500 transition">

                        <img src="../../uploads/<?= $b['cover']; ?>" class="w-full h-56 object-cover">

                        <div class="p-4">
                            <h4 class="font-semibold text-lg line-clamp-2">
                                <?= $b['judul_buku']; ?>
                            </h4>
                            <p class="text-gray-400 text-sm mt-1">
                                <?= $b['pengarang']; ?>
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Stok: <?= $b['stok']; ?>
                            </p>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>

    <!-- LAYANAN (UPGRADE) -->
    <section id="layanan" class="py-24 bg-gray-950">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-3">Layanan Digital</h2>
                <p class="text-gray-400 text-lg">
                    Semua kebutuhan perpustakaan dalam satu sistem modern
                </p>
            </div>

            <!-- GRID BESAR -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                <!-- CARD -->
                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="book" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Peminjaman Buku</h3>
                    <p class="text-gray-400 text-sm">Pinjam buku dengan mudah secara online.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="refresh-cw" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Pengembalian Buku</h3>
                    <p class="text-gray-400 text-sm">Kembalikan buku dengan sistem otomatis.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="bell" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Notifikasi</h3>
                    <p class="text-gray-400 text-sm">Update status secara real-time.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="users" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Manajemen User</h3>
                    <p class="text-gray-400 text-sm">Kelola anggota dengan mudah.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="file-text" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Riwayat Transaksi</h3>
                    <p class="text-gray-400 text-sm">Semua data tercatat rapi.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="shield" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Keamanan</h3>
                    <p class="text-gray-400 text-sm">Data aman dan terpercaya.</p>
                </div>

                <!-- TAMBAHAN -->
                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="search" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Pencarian Buku</h3>
                    <p class="text-gray-400 text-sm">Cari buku dengan cepat.</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-2xl border border-gray-800 hover:border-blue-500 transition">
                    <i data-feather="database" class="text-blue-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2">Database Terpusat</h3>
                    <p class="text-gray-400 text-sm">Semua data dalam satu sistem.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-24 bg-gray-900">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="text-4xl font-bold mb-6">Tentang Libera</h2>

                <p class="text-gray-400 text-lg mb-6 leading-relaxed">
                    Libera adalah sistem perpustakaan digital modern yang dirancang 
                    untuk meningkatkan efisiensi peminjaman buku di sekolah.
                </p>

                <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                    Dengan teknologi ini, semua proses menjadi cepat, praktis, dan transparan.
                </p>

                <div class="space-y-4">
                    <div class="flex gap-2">
                        <i data-feather="check-circle" class="text-blue-500"></i>
                        Mudah digunakan
                    </div>
                    <div class="flex gap-2">
                        <i data-feather="check-circle" class="text-blue-500"></i>
                        Cepat & efisien
                    </div>
                    <div class="flex gap-2">
                        <i data-feather="check-circle" class="text-blue-500"></i>
                        Modern & digital
                    </div>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden border border-gray-800 shadow-xl">
                <iframe src="https://www.google.com/maps?q=SMK+Al+Madani+Garut&output=embed"
                    class="w-full h-90 border-0"></iframe>
            </div>

        </div>
    </section>

    <script>
        feather.replace();
    </script>

</body>
</html>