<?php 


?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <style>
    .custom-bottom-navbar {
        position: fixed;
        max-width: 600px;
        width: 100%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* height: 10vh; */
        bottom: -10%;
        background-color: #f8f9fa;
        border-top: 1px solid #e0e0e0;
        display: flex;  
        align-items: center;
        justify-content: center;
        z-index: 1030;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .custom-bottom-navbar .nav-item {
        flex-grow: 1;
        text-align: center;
        color: #6c757d;
        font-size: 0.85rem;
        text-decoration: none;
    }

    .custom-bottom-navbar .nav-item i {
        font-size: 1.4rem;
        display: block;
    }

    .custom-bottom-navbar .nav-item.active {
        color: #007bff;
    }

    .custom-bottom-navbar .nav-item:hover {
        color: #0056b3;
    }
</style>

</head>

<body>
<nav class="navbar fixed-bottom custom-bottom-navbar">
    <div class="container-fluid d-flex justify-content-around align-items-center">
        <a href="index.php?page=campaigns" class="nav-item">
            <i class="bi bi-house-door"></i>
            <p>Beranda</p>
        </a>
        <a href="index.php?page=donasiSaya" class="nav-item">
            <i class="bi bi-heart"></i>
            <p>Donasi Saya</p>
        </a>
        <a href="index.php?page=galang-dana" class="nav-item">
            <i class="bi bi-plus-circle"></i>
            <p>Galang Dana</p>
        </a>
        <a href="index.php?page=profile" class="nav-item">
            <i class="bi bi-person"></i>
            <p>Profil</p>
        </a>
    </div>
</nav>



</body>
