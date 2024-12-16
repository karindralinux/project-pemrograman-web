<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login
header('Location: ?page=login');
exit();
?>
