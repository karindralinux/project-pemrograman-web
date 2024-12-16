<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

require_once "lib/koneksi.php";

session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: ?page=login");
    exit();
}

// Ambil ID Campaign dari URL
$id_campaign = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil detail kampanye dari database
$query = "SELECT id, nama, deskripsi, dana_target, dana_terkumpul FROM campaign WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_campaign);
$stmt->execute();
$campaign = $stmt->get_result()->fetch_assoc();

if (!$campaign) {
    echo "<script>alert('Kampanye tidak ditemukan.'); window.location.href = 'index.php?page=campaigns';</script>";
    exit();
}

// Proses donasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['user_id'];
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $pesan = $_POST['pesan'];
    $is_anonim = isset($_POST['is_anonim']) ? 1 : 0;

    // Simpan ke database
    $query = "INSERT INTO donasi (id_user, id_campaign, jumlah_donasi, metode_pembayaran, pesan, is_anonim, status)
              VALUES (?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiissi", $id_user, $id_campaign, $jumlah_donasi, $metode_pembayaran, $pesan, $is_anonim);

    if ($stmt->execute()) {
        echo "<script>alert('Donasi berhasil disimpan!'); window.location.href = '?page=donasiSaya';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan donasi.');</script>";
    }
}
?>

<div class="container mt-4">
    <h2 class="mb-4">Form Donasi untuk Kampanye</h2>

    <!-- Detail Kampanye -->
    <div class="campaign-detail mb-4 p-4 border rounded">
        <h4><?= htmlspecialchars($campaign['nama']) ?></h4>
        <p><?= htmlspecialchars($campaign['deskripsi']) ?></p>
        <p><strong>Target:</strong> Rp<?= number_format($campaign['dana_target'], 0, ',', '.') ?></p>
        <p><strong>Terkumpul:</strong> Rp<?= number_format($campaign['dana_terkumpul'], 0, ',', '.') ?></p>
    </div>

    <!-- Form Donasi -->
    <form method="POST" action="" class="p-4 border rounded">
        <div class="mb-3">
            <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
            <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" placeholder="Masukkan jumlah donasi" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="">Pilih metode</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan (Opsional)</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Tuliskan pesan untuk penerima (opsional)"></textarea>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="is_anonim" name="is_anonim">
            <label class="form-check-label" for="is_anonim">Donasi sebagai anonim</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Kirim Donasi</button>
    </form>
</div>

<style>
    .campaign-detail {
        background-color: #f8f9fa;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    form {
        background-color: #ffffff;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }
</style>
