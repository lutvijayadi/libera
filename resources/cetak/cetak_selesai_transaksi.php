<?php
include '../../config/koneksi.php';

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : "";

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $kata = explode(" ", $keyword);

    $conditions = [];
    foreach ($kata as $k) {
        $conditions[] = "(nama LIKE '%$k%' OR judul_buku LIKE '%$k%')";
    }

    $where = implode(" AND ", $conditions);

    $query = "SELECT * FROM transaksi 
              WHERE status='selesai' 
              AND ($where)
              ORDER BY id_transaksi DESC";
} else {
    $query = "SELECT * FROM transaksi 
              WHERE status='selesai' 
              ORDER BY id_transaksi DESC";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Transaksi Selesai</title>

    <link rel="stylesheet" href="../../public/src/output.css">

    <style>
        @media print {
            body {
                background: white !important;
            }
        }
    </style>
</head>

<body onload="window.print()" class="bg-gray-100 font-serif">

<div class="max-w-5xl mx-auto bg-white p-10 shadow-md">

    <!-- KOP SURAT -->
    <div class="flex items-center justify-between border-b-4 border-black pb-4 mb-6">

        <!-- LOGO KIRI -->
        <img src="../img/logo.png" class="w-20 h-20 object-contain">

        <!-- TEXT -->
        <div class="text-center flex-1">
            <h1 class="text-2xl font-bold uppercase">
                PERPUSTAKAAN SEKOLAH
            </h1>
            <h2 class="text-lg font-semibold uppercase">
                SMK AL-MADANI GARUT
            </h2>
            <p class="text-sm text-gray-600">
                Jl. Raya Samarang No.2332, Garut, Jawa Barat 44161
            </p>
        </div>

        <!-- LOGO KANAN -->
        <img src="../img/almadai.png" class="w-20 h-20 object-contain">
    </div>

    <!-- JUDUL -->
    <div class="text-center mb-6">
        <h3 class="text-lg font-semibold uppercase underline">
            Laporan Transaksi Selesai
        </h3>
    </div>

    <!-- DESKRIPSI -->
    <p class="mb-6 text-sm">
        Berikut adalah data transaksi peminjaman dan pengembalian buku yang telah selesai:
    </p>

    <!-- TABEL -->
    <table class="w-full text-sm border border-black">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-black p-2 w-10">No</th>
                <th class="border border-black p-2">Nama</th>
                <th class="border border-black p-2">Buku</th>
                <th class="border border-black p-2">Tanggal Pinjam</th>
                <th class="border border-black p-2">Tanggal Kembali</th>
                <th class="border border-black p-2">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td class="border border-black p-2 text-center"><?= $no++; ?></td>
                <td class="border border-black p-2"><?= $data['nama']; ?></td>
                <td class="border border-black p-2"><?= $data['judul_buku']; ?></td>
                <td class="border border-black p-2 text-center">
                    <?= date('d M Y', strtotime($data['tanggal_pinjam'])); ?>
                </td>
                <td class="border border-black p-2 text-center">
                    <?= date('d M Y', strtotime($data['tanggal_kembali'])); ?>
                </td>
                <td class="border border-black p-2 text-center">
                    Selesai
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- TTD -->
    <div class="mt-16 flex justify-end">
        <div class="text-center">
            <p>Garut, <?= date("d F Y"); ?></p>
            <p class="mb-20">Kepala Perpustakaan</p>
            <p class="border-t border-black w-48 mx-auto pt-1">
                ( ......... )
            </p>
        </div>
    </div>

</div>

</body>
</html>