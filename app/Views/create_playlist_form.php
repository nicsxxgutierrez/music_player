<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Create Playlist</h1>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('music/createPlaylist'); ?>
<input type="text" name="playlist_name" placeholder="Playlist Name">
<button type="submit">Create Playlist</button>
<?= form_close(); ?>

<?= $this->endSection(); ?>