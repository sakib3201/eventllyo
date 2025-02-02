<?php require 'layouts/header.php'; ?>
<div class="row min-vh-100">
    <?php if (empty($data['events'])): ?>
        <div class="col-md-4 offset-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">No Events Available</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Please come back later.
                    </p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($data['events'] as $event): ?>
            <div class="col-md-4">
                <div class="card mb-4 m-2">
                    <div class="card-header">
                        <h5 class="card-title">
                            <a href="event/details/<?php echo $event['id']; ?>">
                                <?php echo $event['name']; ?>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $event['description']; ?>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                <?php echo date('F j, Y', strtotime($event['date'])); ?> at <?php echo $event['start_time']; ?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php require 'layouts/footer.php'; ?>
