<?php
session_start();
include '../config/koneksi.php';

// cek login
if (!isset($_SESSION['id_users'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id_users = $_SESSION['id_users'];

// ambil transaksi user
$query = mysqli_query($koneksi, "
    SELECT * FROM transaksi 
    WHERE id_users='$id_users'
    ORDER BY id_transaksi DESC
");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Status Peminjaman</title>
    <link rel="stylesheet" href="../public/src/output.css">
</head>

<body class="bg-gray-100 font-poppins">

<?php include 'partials/sidebar_user.php'; ?>

<main class="p-6 min-h-screen">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Status Peminjaman Saya
        </h2>
    </div>

    <!-- CARD TABLE -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER CARD -->
        <div class="flex justify-between items-center px-6 py-4 bg-blue-600 text-white">
            <h2 class="text-lg font-semibold">Data Peminjaman</h2>
            <span class="text-sm bg-white/20 px-3 py-1 rounded-full">
                <?= mysqli_num_rows($query); ?> data
            </span>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-blue-500 text-white text-xs uppercase tracking-wide">
                    <tr>
                        <th class="px-6 py-3 text-center">ID</th>
                        <th class="px-6 py-3 text-left">Judul Buku</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-left">Keterangan</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">

                    <?php while ($row = mysqli_fetch_assoc($query)) {

                        // STATUS
                        if ($row['status'] == 'menunggu konfirmasi') {
                            $badge = "bg-yellow-100 text-yellow-700";
                            $ket = "Menunggu persetujuan admin";
                        } elseif ($row['status'] == 'disetujui') {
                            $badge = "bg-blue-100 text-blue-700";
                            $ket = "Buku siap diambil";
                        } elseif ($row['status'] == 'ditolak') {
                            $badge = "bg-red-100 text-red-700";
                            $ket = "Peminjaman ditolak";
                        } elseif ($row['status'] == 'selesai') {
                            $badge = "bg-green-100 text-green-700";
                            $ket = "Buku sudah dikembalikan";
                        } else {
                            $badge = "bg-gray-100 text-gray-600";
                            $ket = "-";
                        }
                    ?>

                    <tr class="hover:bg-blue-50 transition">

                        <!-- ID -->
                        <td class="px-6 py-4 text-center text-gray-500 font-semibold">
                            #<?= $row['id_transaksi']; ?>
                        </td>

                        <!-- JUDUL -->
                        <td class="px-6 py-4 font-semibold text-gray-800">
                            <?= $row['judul_buku']; ?>
                        </td>

                        <!-- TANGGAL -->
                        <td class="px-6 py-4 text-xs">
                            <div class="flex flex-col">
                                <span class="text-blue-600 font-medium">
                                    Pinjam: <?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?>
                                </span>
                                <span class="text-red-400">
                                    Kembali: <?= date('d M Y', strtotime($row['tanggal_kembali'])); ?>
                                </span>
                            </div>
                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $badge ?>">
                                <?= ucfirst($row['status']); ?>
                            </span>
                        </td>

                        <!-- KETERANGAN -->
                        <td class="px-6 py-4 text-gray-600 text-sm">
                            <?= $ket; ?>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>

</main>

</body>

</html>