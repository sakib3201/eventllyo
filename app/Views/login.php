<?php require 'layouts/header.php'; ?>

<h2>Login</h2>

<?php if (!empty($data['error'])): ?>
    <p style="color: red;"><?php echo $data['error']; ?></p>
<?php endif; ?>

<form method="POST" action="/auth/login">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<a href="/auth/register">Don't have an account? Register</a>

<?php require 'layouts/footer.php'; ?>
