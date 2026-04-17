<?php
session_start();
include '../config/koneksi.php';

if (isset($_POST['action'])) {

    $id = $_POST['id_transaksi'];
    $status = strtolower($_POST['action']); // disetujui / ditolak

    // ambil data transaksi
    $query = mysqli_query($koneksi, "
        SELECT * FROM transaksi 
        WHERE id_transaksi = '$id'
    ");

    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Data tidak ditemukan!");
    }

    $id_buku = $data['id_buku'];
    $total_pinjam = $data['total_pinjam'];
    $id_users = $data['id_users'];
    $judul = $data['judul_buku'];

    // update status
    mysqli_query($koneksi, "
        UPDATE transaksi 
        SET status='$status' 
        WHERE id_transaksi='$id'
    ");

    // kalau ditolak → balikin stok
    if ($status == 'ditolak') {
        mysqli_query($koneksi, "
            UPDATE buku 
            SET stok = stok + $total_pinjam 
            WHERE id_buku='$id_buku'
        ");
    }

    // ✅ BUAT NOTIF BARU KE USER (JANGAN DELETE)
    $message = "Peminjaman buku $judul telah $status";
    $message = mysqli_real_escape_string($koneksi, $message);

    mysqli_query($koneksi, "
        INSERT INTO notif (id_transaksi, id_users, message)
        VALUES ('$id', '$id_users', '$message')
    ");

    header("Location: ../admin/konfirmasi_pinjam.php");
    exit;
}
?>