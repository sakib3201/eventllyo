<?php require 'layouts/header.php'; ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Register</h2>

        <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div>
        <?php endif; ?>

        <form method="POST" action="/auth/register" class="bg-light p-4 shadow rounded">
            <div class="mb-3">
                <select name="role" class="form-control" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Event Manager</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <a href="/auth/login">Already have an account? Login</a>
        </div>
    </div>
</div>

<?php require 'layouts/footer.php'; ?>

