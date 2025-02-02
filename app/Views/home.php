<?php require 'layouts/header.php'; ?>
<style>
    .hero {
        background-color: #f5f5f5;
        background-image: linear-gradient(120deg, #e7e4e4 0%, #e7e4e4 50%, #ffb31a 50%, #ffb31a 100%);
        background-size: 200% 200%;
        transition: background-position 3s ease;
    }

    .hero:hover {
        background-position: 100% 0%;
    }
</style>
<div class="hero vh-100 d-flex align-items-center justify-content-center text-center">
    <div>
        <h1 class="display-3">Welcome to Eventllyo</h1>
        <p class="lead">The best place to manage events easily</p>
        
        <?php if (!Core\Session::get('user')): ?>
            <div class="mb-2s">
                <a href="/auth/login" class="btn btn-primary m-2">Login</a>
                <a href="/auth/register" class="btn btn-success m-2">Register</a>        
            </div>
        <?php endif; ?>
        <div class="mb-2">
            <a href="/events" class="btn btn-outline-secondary m-2">View Events</a>
        </div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>

