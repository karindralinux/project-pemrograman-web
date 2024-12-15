<?php
require_once 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
        $error = "Email atau password salah!";
    }

    mysqli_close($conn);
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