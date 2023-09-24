<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Search Results</h1>

<?php if (count($results) > 0) : ?>
    <ul>
        <?php foreach ($results as $musicItem) : ?>
            <li><?= $musicItem['title'] ?> by <?= $musicItem['artist'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>

<?= $this->endSection(); ?>