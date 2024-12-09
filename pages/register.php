<form id="registerForm" class="p-4">
    <h2 class="mb-4 text-center">Create Account</h2>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>
    <p class="auth-link mt-3 text-center">Already have an account? <a href="?page=login">Login here</a></p>
</form>