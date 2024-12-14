<?php
require_once 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek_email = "SELECT * FROM users WHERE email = '$email'";
    $result_email = mysqli_query($conn, $cek_email);

    $cek_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = mysqli_query($conn, $cek_username);

    if (mysqli_num_rows($result_email) > 0) {
        $error = "Email sudah terdaftar!";
    } elseif (mysqli_num_rows($result_username) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($conn, $query)) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Registrasi gagal: " . mysqli_error($conn);
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