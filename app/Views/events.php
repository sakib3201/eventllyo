<?php require 'layouts/header.php'; ?>
<h1>Events</h1>
<ul>
    <?php foreach ($data['events'] as $event): ?>
        <li>
            <a href="event/details/<?php echo $event['id']; ?>">
                <?php echo $event['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php require 'layouts/footer.php'; ?>
