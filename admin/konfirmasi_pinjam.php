<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

// hanya tampilkan yang belum dikonfirmasi
$query = mysqli_query($koneksi, "
    SELECT * FROM transaksi 
    WHERE status='menunggu konfirmasi' 
    ORDER BY id_transaksi DESC
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Peminjaman</title>
    <link rel="stylesheet" href="../public/src/output.css">
</head>

<body class="bg-[#B0FFFA]">
    <?php include 'partials/sidebar.php'; ?>

    <main class="ml-60 p-6">
        <h2 class="text-xl font-bold mb-4">Konfirmasi Peminjaman</h2>

        <div class="mt-4 relative overflow-hidden bg-blue-300 shadow-md rounded-2xl border border-blue-200">
            <table class="w-full text-sm text-left text-gray-600">

                <!-- HEADER -->
                <thead class="text-xs uppercase bg-blue-600 text-white border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-bold">Nama</th>
                        <th class="px-6 py-4 font-bold">Judul Buku</th>
                        <th class="px-6 py-4 font-bold">Tanggal</th>
                        <th class="px-6 py-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-100 bg-white">
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr class="hover:bg-blue-50/50 transition-colors">

                            <!-- NAMA -->
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">
                                    <?= $row['nama']; ?>
                                </div>
                            </td>

                            <!-- JUDUL -->
                            <td class="px-6 py-4">
                                <div class="text-gray-700 italic">
                                    "<?= $row['judul_buku']; ?>"
                                </div>
                            </td>

                            <!-- TANGGAL -->
                            <td class="px-6 py-4 text-sm">
                                <div class="flex flex-col">
                                    <span class="text-blue-600 font-medium">
                                        <?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?>
                                    </span>
                                    <span class="text-red-400">
                                        <?= date('d M Y', strtotime($row['tanggal_kembali'])); ?>
                                    </span>
                                </div>
                            </td>

                            <!-- AKSI -->
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">

                                    <!-- SETUJUI -->
                                    <form action="../aksi/aksi_update_status.php" method="POST">
                                        <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                                        <button type="submit" name="action" value="disetujui"
                                            class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs hover:bg-green-600 transition">
                                            Setujui
                                        </button>
                                    </form>

                                    <!-- TOLAK -->
                                    <form action="../aksi/aksi_update_status.php" method="POST">
                                        <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                                        <button type="submit" name="action" value="ditolak"
                                            onclick="return confirm('Tolak peminjaman ini?')"
                                            class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600 transition">
                                            Tolak
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </main>
</body>

</html>