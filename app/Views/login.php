<?php require 'layouts/header.php'; ?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Login</h2> <?php if (! empty($data['error'])) : ?>
            <div class="alert alert-danger"><?php echo $data['error']; ?></div> <?php endif; ?>
        <form method="POST" action="/auth/login" class="bg-light p-4 shadow rounded">
            <div class="mb-3"> 
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3"> 
                <input type="password" name="password" class="form-control" placeholder="Password" required> 
            </div> 
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3"> <a href="/auth/register">Don't have an account? Register</a> </div>
    </div>
</div> <?php require 'layouts/footer.php'; ?>