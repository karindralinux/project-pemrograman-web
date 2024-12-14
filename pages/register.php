<?php
require_once 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Ambil input email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];

   // Query untuk memeriksa email dan password di database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        
        header("Location: ?page=campaigns");
        exit();
    } else {
       // Login gagal
        $error = "Email atau password salah!";
    }

   // Tutup koneksi
    mysqli_close($conn);
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