<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

require_once('lib/koneksi.php');
require "include/footer.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $goal_amount = $_POST['goal_amount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $campaigner_id = $_POST['campaigner_id'];

    // Validasi data
    if (empty($title) || empty($description) || empty($goal_amount) || empty($start_date) || empty($end_date) || empty($campaigner_id)) {
        echo "<p class='text-danger'>Semua kolom wajib diisi.</p>";
    } else {
        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO campaigns (title, description, image_url, goal_amount, start_date, end_date, campaigner_id, created_by, updated_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $created_by = 1; // Asumsikan admin atau user ID 1, ganti sesuai implementasi autentikasi Anda
        $updated_by = 1;
        $stmt->bind_param("sssdsssii", $title, $description, $image_url, $goal_amount, $start_date, $end_date, $campaigner_id, $created_by, $updated_by);

        if ($stmt->execute()) {
            echo "<p class='text-success'>Kampanye berhasil dibuat!</p>";
        } else {
            echo "<p class='text-danger'>Terjadi kesalahan: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}

// Ambil daftar penggalang dana dari tabel campaigners
$campaigners = $conn->query("SELECT id, organization_name FROM campaigners");
?>


<body style="background-color:rgb(255, 255, 255);">

    <!-- Tombol Kembali -->
    <a href="?page=campaigns" class="btn btn-outline-secondary mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z" />
        </svg>
        Kembali
    </a>

    <h2 class="mb-4 text-center">Buat Campaign Baru</h2>
    <form method="POST" action="" style="background-color:rgb(233, 225, 225); padding: 20px; border-radius: 10px;">
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Judul Kampanye</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label fw-bold">URL Gambar</label>
            <input type="url" class="form-control" id="image_url" name="image_url">
        </div>
        <div class="mb-3">
            <label for="goal_amount" class="form-label fw-bold">Target Donasi (Rp)</label>
            <input type="number" class="form-control" id="goal_amount" name="goal_amount" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label fw-bold">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label fw-bold">Tanggal Selesai</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="campaigner_id" class="form-label fw-bold">Penggalang Dana</label>
            <select class="form-control" id="campaigner_id" name="campaigner_id" required>
                <option value="">Pilih Penggalang Dana</option>
                <?php while ($campaigner = $campaigners->fetch_assoc()): ?>
                    <option value="<?php echo $campaigner['id']; ?>">
                        <?php echo $campaigner['organization_name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buat Campaign</button>
    </form>
    </div>