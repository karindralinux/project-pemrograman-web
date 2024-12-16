<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true)) {
    header("Location: ?page=campaigns");
}

?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1>KitaBantu</h1>
        <div class="my-auto mt-2">
            <a href="?page=register" class="btn btn-primary">Daftar</a>
            <a href="?page=login" class="btn btn-secondary">Login</a>
        </div>
    </div>
</div>