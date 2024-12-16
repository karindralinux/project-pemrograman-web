<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true)) {
    header("Location: ?page=campaigns");
}

require_once 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek email menggunakan prepared statement
    $stmt_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt_email->bind_param("s", $email);
    $stmt_email->execute();
    $result_email = $stmt_email->get_result();

    // Cek username menggunakan prepared statement
    $stmt_username = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt_username->bind_param("s", $username);
    $stmt_username->execute();
    $result_username = $stmt_username->get_result();

    if ($result_email->num_rows > 0) {
        $error = "Email sudah terdaftar!";
    } elseif ($result_username->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert data menggunakan prepared statement
        $stmt_insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt_insert->execute()) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Registrasi gagal: " . $stmt_insert->error;
        }
    }
}
?>

<form method="post" class="p-4">
    <h2 class="mb-4 text-center">Create Account</h2>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if(isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>
    <p class="auth-link mt-3 text-center">Already have an account? <a href="?page=login">Login here</a></p>
</form>