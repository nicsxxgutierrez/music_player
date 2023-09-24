<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Add Music to Playlist</h1>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('music/addToPlaylist'); ?>
<label for="music_id">Select Music:</label>
<select name="music_id" id="music_id">
    <?php foreach ($musicItems as $musicItem) : ?>
        <option value="<?= $musicItem['id'] ?>"><?= $musicItem['title'] ?></option>
    <?php endforeach; ?>
</select>

<label for="playlist_id">Select Playlist:</label>
<select name="playlist_id" id="playlist_id">
    <?php foreach ($playlists as $playlist) : ?>
        <option value="<?= $playlist['id'] ?>"><?= $playlist['name'] ?></option>
    <?php endforeach; ?>
</select>

<button type="submit">Add to Playlist</button>
<?= form_close(); ?>

<?= $this->endSection(); ?>