<?php require 'layouts/header.php'; ?>

<h2>Register</h2>

<?php if (!empty($data['error'])): ?>
    <p style="color: red;"><?php echo $data['error']; ?></p>
<?php endif; ?>

<form method="POST" action="/auth/register">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<a href="/auth/login">Already have an account? Login</a>

<?php require 'layouts/footer.php'; ?>
