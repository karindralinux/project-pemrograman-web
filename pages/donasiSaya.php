<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: ?page=login");
    exit();
}

require "include/footer.php";
require_once 'lib/koneksi.php'; 

$email = $_SESSION['email'];
$queryUser = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($queryUser);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


$id_user = $user['id'];

$query = "SELECT d.id AS id_donasi, c.title AS title, c.image_url, d.jumlah_donasi, d.metode_pembayaran,
            d.pesan, d.is_anonim, d.status, d.created_at FROM donasi d JOIN campaigns c ON d.id_campaign = c.id WHERE d.id_user = ? ORDER BY d.created_at DESC";

// $query = "SELECT c.title, c.description, c.goal_amount AS dana_target, c.raised_amount AS dana_terkumpul FROM campaigns c WHERE c.id = ?";


$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$donasiList = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<style>


.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #007bff;
}

.card-text em {
    font-size: 0.9rem;
    color: #6c757d;
}

.card-footer small {
    font-size: 0.85rem;
    color: #6c757d;
}

</style>

<div class="">

</div>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Riwayat Donasi Saya</h2>
    
    <?php if (empty($donasiList)): ?>
        <div class="alert alert-info text-center">
            <p>Anda belum pernah melakukan donasi.</p>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($donasiList as $donasi): ?>
                <div class="col-md-6 col-lg-6  mb-4">
                    <div class="card h-100">
                        
                        <img 
                            src="<?php echo htmlspecialchars($donasi['image_url']); ?>" 
                            class="card-img-top" 
                            alt="<?= htmlspecialchars($donasi['title']) ?>">
                            <!-- <h1><?php echo htmlspecialchars($donasi['image_url']); ?></h1> -->
                        
                        <div class="card-body">
                            
                            <h5 class="card-title"><?= htmlspecialchars($donasi['title']) ?></h5>

                            <?php if (!empty($donasi['pesan'])): ?>
                                <p class="card-text text-muted">
                                    <em>"<?= htmlspecialchars($donasi['pesan']) ?>"</em>
                                </p>
                            <?php endif; ?>

                            <!-- jumlah donasinya -->
                            <p class="card-text">
                                <strong>Donasi:</strong> Rp<?= number_format($donasi['jumlah_donasi'], 0, ',', '.') ?>
                            </p>

                            <!-- stauts -->
                            <p class="card-text">
                                <strong>Status:</strong> 
                                <span class="badge bg-<?= $donasi['status'] === 'success' ? 'success' : ($donasi['status'] === 'pending' ? 'warning' : 'danger') ?>">
                                    <?= ucfirst($donasi['status']) ?>
                                </span>
                            </p>
                        </div>

                        <div class="card-footer">
                            <small class="text-muted">Tanggal Donasi: <?= date('d M Y, H:i', strtotime($donasi['created_at'])) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
