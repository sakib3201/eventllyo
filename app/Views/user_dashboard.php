<?php 
    require 'layouts/header.php';
    
    $user = Core\Session::get('user');
    $bookings = $data['bookings'];
?>
<div class="container mt-5">
    <div class="card mx-auto mt-5" style="width: 30rem;">
        <div class="card-body">
            <h3 class="card-title text-center">Your Information</h3>
            <hr>
            <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        </div>
    </div>

    <div>
        <h3 class="text-center mt-5">Your Bookings</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($bookings)): ?>
                        <tr>
                           <td colspan="3" class="text-center"> You have no bookings yet</td>.
                        </tr>
                    <?php else: ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($booking['event_name']); ?></td>
                            <td><?php echo date('F j, Y', strtotime($booking['event_date'])); ?></td>
                            <td><?php echo ucfirst(htmlspecialchars($booking['status'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
    </div>
</div>

<?php require 'layouts/footer.php'; ?>