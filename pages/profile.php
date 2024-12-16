<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

// Ambil informasi pengguna dari sesi
$username = $_SESSION['username'] ;
$email = $_SESSION['email'];
require "include/footer.php";


?>

<div class="container mt-4">
    <h2>Profil Pengguna</h2>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Informasi Pengguna</h5>
            <p class="card-text"><strong>Nama:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>
    </div>

    <!-- Tombol Logout -->
    <div class="mt-4">
        <a href="?page=logout" class="btn btn-danger">Logout</a>
    </div>
</div>
