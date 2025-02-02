<?php require 'layouts/header.php'; ?>
<div class="container my-5">
    <h1 class="text-center">Admin Dashboard</h1>
    <hr>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Admin Details</h5>
                </div>
                <div class="card-body">
                    <p>Name: <?php echo htmlspecialchars(Core\Session::get('user')['name']); ?></p>
                    <p>Email: <?php echo htmlspecialchars(Core\Session::get('user')['email']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h1 class="text-center">Events</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $eventModel = new App\Models\Event();
                    $events = $eventModel->all();
                    if (empty($events)): ?>
                        <tr>
                            <td colspan="6" class="text-center">No events created</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($event['name']); ?></td>
                            <td><?php echo htmlspecialchars($event['description']); ?></td>
                            <td><?php echo date('F j, Y', strtotime($event['date'])); ?></td>
                            <td><?php echo date('g:i A', strtotime($event['start_time'])); ?></td>
                            <td><?php echo date('g:i A', strtotime($event['end_time'])); ?></td>
                            <td>
                                <a href="/event/edit/<?php echo $event['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="/event/delete/<?php echo $event['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
            <a href="/event/create" class="btn btn-success">Create Event</a>
        </div>
    </div>
</div>
<?php require 'layouts/footer.php'; ?>