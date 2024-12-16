<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true)) {
    header("Location: ?page=campaigns");
}

require_once 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user dari database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id'];
            
            header("Location: ?page=campaigns");
            exit();
        } else {
            $error = 'Email atau password salah.';
        }

    } else {
        $error = 'Email atau password salah.';
    }

}
?>


<form method="post" class="p-4">
    <h2 class="mb-4 text-center">Login</h2>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <p class="auth-link mt-3 text-center">Don't have an account? <a href="?page=register">Register here</a></p>
</form>