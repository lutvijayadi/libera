<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// koneksi
include __DIR__ . '/../../config/koneksi.php';

// ambil user
$id_users = $_SESSION['id_users'] ?? 0;
$query_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_users='$id_users'");
$user = mysqli_fetch_assoc($query_user);
?>

<nav class="bg-blue-600 fixed w-full z-20 top-0 border-b border-blue-500 shadow-md">
    <div class="max-w-7xl flex items-center justify-between mx-auto p-4">

        <!-- LOGO -->
        <a href="#" class="flex items-center space-x-3">
            <img src="../resources/img/logo.png" class="h-8 filter brightness-0 invert" alt="Logo" />
            <span class="text-xl font-bold tracking-widest text-white uppercase">Libera</span>
        </a>

        <!-- MENU -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="../user/dashboard_user.php" class="text-white hover:text-blue-200 font-medium">
                Dashboard
            </a>
            <a href="../user/pengembalian_buku.php" class="text-white hover:text-blue-200 font-medium">
                Pengembalian
            </a>
            <a href="../user/notif_status.php" class="text-white hover:text-blue-200 font-medium">
                Status Pinjaman
            </a>
        </div>

        <!-- USER -->
        <div class="flex items-center gap-3">

            <!-- USER INFO -->
            <div class="flex items-center bg-blue-700/50 px-4 py-2 rounded-xl border border-blue-400/30 shadow-sm">
                <div class="mr-3 text-right hidden sm:block">
                    <p class="text-xs font-semibold text-white leading-tight">
                        <?= $user['nama'] ?? $_SESSION['username'] ?? 'User'; ?>
                    </p>
                    <p class="text-[10px] text-blue-200 uppercase">user</p>
                </div>

                <!-- ICON USER -->
                <div
                    class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center border border-white/30 overflow-hidden">
                    <img src="../resources/img/user.png" class="w-4 h-4 object-contain">
                </div>
            </div>

            <!-- LOGOUT BUTTON -->
            <a href="../auth/logout_user.php" onclick="return confirm('Yakin ingin logout?')"
                class="flex items-center gap-2 bg-red-400 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm shadow-md hover:shadow-lg transition-all">

                <!-- ICON PNG -->
                <img src="../resources/img/logout.png" class="w-4 h-4 object-contain">

                <span class="hidden sm:inline">Logout</span>
            </a>

            <!-- MOBILE BUTTON -->
            <button class="md:hidden p-2 text-white hover:bg-blue-700 rounded-lg transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

        </div>
    </div>
</nav>

<div class="h-20"></div>

<script>
    feather.replace();
</script>