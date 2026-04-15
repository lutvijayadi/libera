<?php
include '../../config/koneksi.php';

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : "";

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($koneksi, $keyword);

    $query = "SELECT * FROM transaksi 
              WHERE 
                nama LIKE '%$keyword%' OR
                judul_buku LIKE '%$keyword%' OR
                status LIKE '%$keyword%' OR
                tanggal_pinjam LIKE '%$keyword%' OR
                tanggal_kembali LIKE '%$keyword%'
              ORDER BY id_transaksi DESC";
} else {
    $query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Transaksi</title>

    <!-- Tailwind -->
    <link rel="stylesheet" href="../../public/src/output.css">

    <style>
        @media print {
            body {
                background: white !important;
            }
        }
    </style>
</head>

<body onload="window.print()" class="bg-gray-200 font-serif">

<div class="flex items-center justify-between border-b-4 border-black pb-4 mb-6">

    <!-- LOGO KIRI -->
    <img src="../img/logo.png" class="w-60 h-16 object-contain">

    <!-- TEXT TENGAH -->
    <div class="text-center flex-1">
        <h2 class="text-lg font-bold tracking-wide">
            PERPUSTAKAAN SEKOLAH
        </h2>
        <h3 class="text-base font-semibold">
            SMK AL-MADANI GARUT
        </h3>
        <p class="text-xs text-gray-600">
            Jl. Raya Samarang No.2332, Garut, Jawa Barat 44161
        </p>
    </div>

    <!-- LOGO KANAN -->
    <img src="../img/almadai.png" class="w-62 h-16 object-contain">

</div>

    <!-- JUDUL -->
    <div class="text-center mb-6">
        <h3 class="text-base font-bold uppercase">
            Laporan Data Transaksi
        </h3>
    </div>

    <!-- DESKRIPSI -->
    <p class="text-sm mb-4">
        Berikut adalah data transaksi peminjaman dan pengembalian buku:
    </p>

    <!-- TABEL -->
    <table class="w-full text-sm border border-black">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-black p-2 w-10">No</th>
                <th class="border border-black p-2 text-left">Nama</th>
                <th class="border border-black p-2 text-left">Buku</th>
                <th class="border border-black p-2 text-center">Tgl Pinjam</th>
                <th class="border border-black p-2 text-center">Tgl Kembali</th>
                <th class="border border-black p-2 text-center">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td class="border border-black p-2 text-center"><?php echo $no++; ?></td>
                <td class="border border-black p-2"><?php echo $row['nama']; ?></td>
                <td class="border border-black p-2"><?php echo $row['judul_buku']; ?></td>
                <td class="border border-black p-2 text-center">
                    <?php echo date('d-m-Y', strtotime($row['tanggal_pinjam'])); ?>
                </td>
                <td class="border border-black p-2 text-center">
                    <?php echo date('d-m-Y', strtotime($row['tanggal_kembali'])); ?>
                </td>
                <td class="border border-black p-2 text-center">
                    <?php echo ucfirst($row['status']); ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- TTD -->
    <div class="mt-12 flex justify-end">
        <div class="text-center">
            <p class="text-sm mb-1">
                Garut, <?php echo date("d F Y"); ?>
            </p>
            <p class="text-sm mb-16">
                Petugas Perpustakaan
            </p>

            <p class="border-t border-black w-48 mx-auto pt-1 ">
                ( ................................. )
            </p>
        </div>
    </div>

</div>

</body>
</html>