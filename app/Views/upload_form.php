<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Upload Music</h1>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open_multipart('music/upload'); ?>
<input type="file" name="music_file">
<button type="submit">Upload</button>
<?= form_close(); ?>

<?= $this->endSection(); ?>
