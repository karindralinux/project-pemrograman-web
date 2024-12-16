<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");

require_once('lib/koneksi.php');
require "include/footer.php";

$limit = 5; // Jumlah data per halaman
$currentPage = isset($_GET['currentPage']) ? (int)$_GET['currentPage'] : 1;
$start = ($currentPage > 1) ? ($currentPage * $limit) - $limit : 0;

$stmt = $conn->prepare("SELECT * FROM campaigns LIMIT ?, ?");
$stmt->bind_param("ii", $start, $limit);
$stmt->execute();

$campaigns = $stmt->get_result();

$total = $conn->query("SELECT COUNT(*) as total FROM campaigns")->fetch_assoc()['total'];
$totalPages = ceil($total / $limit);


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Kita Bantu</a>
        <div class="d-flex">
            <!-- Tombol Logout -->
            <a href="?page=logout">
                <button id="logoutBtn" class="btn btn-secondary">Logout</button>
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex flex-column">
        <?php
        foreach ($campaigns as $campaign) {
            // Hitung persentase progress
            $progress = ceil(($campaign['raised_amount'] / $campaign['goal_amount']) * 100);

            echo '<div class="mb-4 campaign-card d-flex" onclick="redirectToDetail(' . $campaign['id'] . ')">';
            echo '<img src="' . $campaign['image_url'] . '" alt="campaign image" class="campaign-img">';
            echo '<div class="card-content">';
            echo '<h5 class="card-title">' . $campaign['title'] . '</h5>';
            echo '<p class="campaign-description">' . $campaign['description'] . '</p>';
            echo '<div class="progress mt-2">';
            echo '<div class="progress-bar" role="progressbar" style="width: ' . $progress . '%;" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100"></div>';
            echo '</div>';
            echo '<div class="d-flex justify-content-between align-items-center mt-2">';
            echo '<p class="campaign-raised mb-0"><strong>Terkumpul</strong> <br>Rp' . number_format($campaign['raised_amount'], 0, ',', '.') . '</p>';
            $remaining_days = (strtotime($campaign['end_date']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
            echo '<p class="campaign-days mb-0"><strong>Sisa Hari</strong> <br>' . max(0, $remaining_days) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                        <a class="page-link" href="?page=campaigns&currentPage=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    // Mengarahkan ke detail campaign berdasarkan ID
    function redirectToDetail(campaignId) {
        window.location.href = '?page=campaign-detail&id=' + campaignId;
    }

</script>

<style>
    /* Card Layout */
    .campaign-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        overflow: hidden;
        padding: 10px;
    }

    /* Campaign Image */
    .campaign-img {
        width: 200px;
        height: 130px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 15px;
    }

    /* Card Content */
    .card-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .organization-name {
        font-size: 0.9rem;
        color: #6c757d;
    }

    /* Organization Badge */
    .org-badge {
        background-color: #f0f0f0;
        color: #007bff;
        font-size: 0.8rem;
        font-weight: bold;
        padding: 2px 5px;
        border-radius: 3px;
    }

    /* Progress Bar */
    .progress {
        background-color: #e9ecef;
        border-radius: 20px;
        height: 8px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: #007bff;
        height: 100%;
    }

    /* Donation and Days Remaining */
    .campaign-raised, .campaign-days {
        font-size: 0.85rem;
        text-align: center;
    }

    .campaign-raised strong,
    .campaign-days strong {
        font-size: 0.9rem;
        color: #333;
    }
</style>
