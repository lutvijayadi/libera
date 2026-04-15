<?php
session_start();
include '../config/koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$bukti = $_FILES['bukti']['name'];
$tmp = $_FILES['bukti']['tmp_name'];

$nama_file = time() . '_' . $bukti;
$path = "../uploads/bukti/" . $nama_file;

// upload file
move_uploaded_file($tmp, $path);
// ambil data transaksi
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Transaksi tidak ditemukan!");
}

$id_buku = $data['id_buku'];
$total_pinjam = $data['total_pinjam'];

// 1. update status transaksi
mysqli_query($koneksi, "UPDATE transaksi 
SET status='selesai', 
    tanggal_kembali='$tanggal_kembali',
    bukti_kembali='$nama_file'
WHERE id_transaksi='$id_transaksi'");

$link_bukti = "<br><a href='../uploads/bukti/$nama_file' target='_blank'>Lihat Bukti</a>";

$message = "Buku " . $data['judul_buku'] . " telah dikembalikan." . $link_bukti;

// 2. kembalikan stok buku
mysqli_query($koneksi, "UPDATE buku 
SET stok = stok + $total_pinjam 
WHERE id_buku='$id_buku'");

// 3. notif (optional)
$message = "Buku " . $data['judul_buku'] . " telah dikembalikan.";
$message = mysqli_real_escape_string($koneksi, $message);

mysqli_query($koneksi, "INSERT INTO notif (id_transaksi, message) 
VALUES ('$id_transaksi', '$message')");

echo "<script>alert('Buku berhasil dikembalikan');window.location='../user/notif_status.php';</script>";
?>