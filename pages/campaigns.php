<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");
require "include/footer.php";
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Kita Bantu</a>
        <div class="d-flex">
            <button id="logoutBtn" class="btn btn-secondary">Logout</button>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <h2 class="mb-3">Bantu Siapa Hari Ini?</h2>
    <div id="campaignsList" class="d-flex flex-column">
        <?php
        $dummyCampaigns = [
            [
                'id' => 1,
                'title' => 'Sambut Natal, Bantu Jemaat Kokohkan Gereja',
                'organization' => 'YAYASAN GERAKAN KERJA KEMANUSIAAN',
                'goal' => 58919028,
                'raised' => 42919028,
                'remaining_days' => 73,
                'image' => 'https://via.placeholder.com/200x130?random=1'
            ],
            [
                'id' => 2,
                'title' => 'Tolong, Selamatkan Nyawa Balita Sakit Kronis!',
                'organization' => 'Yayasan Rungu Sejahtera Umat',
                'goal' => 361065,
                'raised' => 180532,
                'remaining_days' => 20,
                'image' => 'https://via.placeholder.com/200x130?random=2'
            ]
        ];

        foreach ($dummyCampaigns as $campaign) {
            // Hitung persentase progress
            $progress = ceil(($campaign['raised'] / $campaign['goal']) * 100);

            echo '<div class="mb-4 campaign-card d-flex" onclick="redirectToDetail(' . $campaign['id'] . ')">';
            echo '<img src="' . $campaign['image'] . '" alt="campaign image" class="campaign-img">';
            echo '<div class="card-content">';
            echo '<h5 class="card-title">' . $campaign['title'] . '</h5>';
            echo '<p class="organization-name d-flex align-items-center">';
            echo $campaign['organization'];
            echo '</p>';
            echo '<div class="progress mt-2">';
            echo '<div class="progress-bar" role="progressbar" style="width: ' . $progress . '%;" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100"></div>';
            echo '</div>';
            echo '<div class="d-flex justify-content-between align-items-center mt-2">';
            echo '<p class="campaign-raised mb-0"><strong>Terkumpul</strong> <br>Rp' . number_format($campaign['raised'], 0, ',', '.') . '</p>';
            echo '<p class="campaign-days mb-0"><strong>Sisa Hari</strong> <br>' . $campaign['remaining_days'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
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
    .campaign-raised,
    .campaign-days {
        font-size: 0.85rem;
        text-align: center;
    }

    .campaign-raised strong,
    .campaign-days strong {
        font-size: 0.9rem;
        color: #333;
    }
</style>