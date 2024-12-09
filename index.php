<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        session_start();

        $isAuthenticated = !(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true);
        $title =  $_GET['page'] ?? 'KitaBantu';
        echo $title;
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            color: #333;
            font-size: 16px;
            justify-content: center;
        }

        .app {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: 100vh;
        }
    </style>
</head>


<body>

    <div class="app">
        <?php

        ini_set("display_errors", true);
        define("LEWAT_INDEX", true);

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            // Halaman Default
            $page = 'home';
        };

        $page_to_open = "pages/" . $page . ".php";

        // Cek Ketersediaan File
        if (file_exists($page_to_open) == false) {
            $page_to_open = "pages/missing.php";
            require_once($page_to_open);
            return;
        }

        $guestPages = ['login', 'register', 'home', 'campaigns', 'campaign-detail'];

        if (!$isAuthenticated && !in_array($page, $guestPages)) {
            echo '<div class="alert alert-warning" role="alert">Anda belum login. Silakan login terlebih dahulu. <a href="?page=login" class="btn btn-primary btn-sm ms-2">Login</a></div>';
            exit();
        } else if ($isAuthenticated && $page == 'login') {
            $page_to_open = "pages/home.php";
        }


        require_once($page_to_open);
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>