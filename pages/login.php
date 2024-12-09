<form action="?page=campaigns" class="p-4" method="post">
    <h2 class="mb-4 text-center">Login</h2>
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