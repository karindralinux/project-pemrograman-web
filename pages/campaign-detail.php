<?php
if (defined("LEWAT_INDEX") == false) die("Tidak boleh akses langsung!");
require "include/footer.php"
?>
<div class="campaign-detail-card">
    <!-- Header Image -->
    <div class="header-image position-relative">
        <img src="https://via.placeholder.com/600x300" alt="Header Image" class="header-img">
    </div>

    <!-- Organization Info -->
    <div class="organization-info d-flex align-items-center mt-3">
        <img src="https://via.placeholder.com/50" alt="Organization Logo" class="org-logo">
        <div class="org-details">
            <h5 class="org-name">Yayasan Ruang Sejahtera Umat</h5>
            <p class="org-status d-flex align-items-center">
                <span class="verif-badge">✔ Identitas terverifikasi</span>
            </p>
        </div>
    </div>

    <!-- Campaign Description -->
    <div class="campaign-description mt-3">
        <h5>Tolong, Selamatkan Nyawa Balita Sakit Kronis!</h5>
        <p class="donation-amount text-danger">Rp455.881</p>
        <p class="see-more">Lihat semua &#9660;</p>
    </div>

    <!-- Info Box -->
    <div class="info-box mt-3">
        Semakin banyak donasi yang terkumpul, semakin besar bantuan yang bisa disalurkan oleh <strong>donatur</strong>.
    </div>

    <!-- Tabs -->
    <div class="campaign-tabs mt-4">
        <a href="#" class="tab-link active">Cerita Penggalangan Dana</a>
        <a href="#" class="tab-link">Donatur</a>
    </div>

    <!-- Campaign Story -->
    <div class="campaign-story mt-3">
        <p><strong>23 Agt 2024</strong></p>
        <p>Sadis, ada ratusan anak menderita sakit kanker di pelosok daerah yang tidak bisa mendapat pengobatan...</p>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons mt-4 d-flex justify-content-between">
        <a href="#" class="w-100"><button class="btn btn-primary btn-lg w-100">Donasi</button></a>
    </div>
</div>

<style>
    /* Style for the container */
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }



    /* Header Image */
    .header-image {
        position: relative;
    }

    .header-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .header-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        color: #fff;
    }

    .header-highlight {
        font-size: 1.5rem;
        font-weight: bold;
        background-color: red;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .header-caption {
        font-size: 0.9rem;
        background-color: rgba(0, 0, 0, 0.6);
        margin-top: 5px;
        padding: 5px;
        border-radius: 4px;
    }

    /* Organization Info */
    .organization-info {
        gap: 10px;
    }

    .org-logo {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }

    .org-name {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
    }

    .org-status {
        color: #6c757d;
        font-size: 0.85rem;
    }

    .verif-badge {
        color: #007bff;
        font-weight: bold;
        margin-left: 5px;
    }

    /* Campaign Description */
    .campaign-description h5 {
        font-size: 1rem;
        font-weight: bold;
    }

    .donation-amount {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .see-more {
        color: #6c757d;
        font-size: 0.85rem;
        cursor: pointer;
    }

    /* Info Box */
    .info-box {
        padding: 15px;
        background-color: #f8f9fa;
        color: #495057;
        border-radius: 5px;
        font-size: 0.9rem;
    }

    /* Tabs */
    .campaign-tabs {
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        gap: 10px;
    }

    .tab-link {
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
        color: #6c757d;
        padding-bottom: 5px;
        border-bottom: 2px solid transparent;
    }

    .tab-link.active {
        color: #007bff;
        border-bottom: 2px solid #007bff;
    }

    /* Campaign Story */
    .campaign-story {
        font-size: 0.9rem;
        color: #495057;
    }

    .campaign-story strong {
        font-size: 1rem;
    }

    /* Action Buttons */
    .action-buttons .btn {
        width: 48%;
    }

    .btn-lg {
        font-size: 1.1rem;
        font-weight: bold;
    }
</style>