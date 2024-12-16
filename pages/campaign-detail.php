<?php

if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

require_once('lib/koneksi.php');
require "include/footer.php";

// Ambil ID campaign dari parameter URL
$campaignId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil detail campaign dari database
$stmt = $conn->prepare("SELECT campaigns.*, campaigners.* FROM campaigns LEFT JOIN campaigners ON campaigns.campaigner_id = campaigners.id WHERE campaigns.id = ?");
$stmt->bind_param("i", $campaignId);
$stmt->execute();
$campaign = $stmt->get_result()->fetch_assoc();

if (!$campaign) {
    die("Campaign tidak ditemukan!");
}

$progress = ceil(($campaign['raised_amount'] / $campaign['goal_amount']) * 100);

?>

<div class="overflow-hidden rounded-top">
    <img src="<?php echo htmlspecialchars($campaign['image_url']); ?>" alt="Header Image" class="img-fluid">
</div>
<div class="d-flex align-items-center mt-3 bg-white p-3">
    <img src="<?php echo htmlspecialchars($campaign['logo_url']); ?>" alt="Organization Logo" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
    <p class="ms-3 mb-0" style="font-size: 16px"><?php echo htmlspecialchars($campaign['organization_name']); ?></p>
</div>
<div class="p-3">
    <p style="font-size: 20px;font-weight:bold;"><?php echo htmlspecialchars($campaign['title']); ?></p>

    <p class="text-primary" style="font-size: 20px; font-weight:bold;"><?= 'Rp ' . number_format($campaign['raised_amount'], 0, ',', '.') ?></p>
    <p>Terkumpul dari <b><?= 'Rp ' . number_format($campaign['goal_amount'], 0, ',', '.') ?></b></p>

    <?php
    echo '<div class="progress mt-2">';
    echo '<div class="progress-bar" role="progressbar" style="width: ' . $progress . '%;" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100"></div>';
    echo '</div>';
    ?>
</div>
<div class="mt-3 p-3">
    <div class="d-flex justify-content-between">
        <p>Mulai : <strong><?php echo date('d M Y', strtotime($campaign['start_date'])); ?></strong></p>
        <p>Berakhir : <strong><?php echo date('d M Y', strtotime($campaign['end_date'])); ?></strong></p>
    </div>

    <p><?php echo nl2br(htmlspecialchars($campaign['description'])); ?></p>
</div>
<div class="text-center mt-4">
    <a href="?page=formDonasi&id=<?php echo $campaignId; ?>" class="btn btn-primary btn-lg w-100">Donasi</a>
</div>