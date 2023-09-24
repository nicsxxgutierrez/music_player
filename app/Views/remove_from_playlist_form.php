<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Remove Music from Playlist</h1>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?= form_open('music/removeFromPlaylist'); ?>
<label for="music_id">Select Music to Remove:</label>
<select name="music_id" id="music_id">
    <?php foreach ($musicInPlaylist as $musicItem) : ?>
        <option value="<?= $musicItem['id'] ?>"><?= $musicItem['title'] ?></option>
    <?php endforeach; ?>
</select>

<label for="playlist_id">Select Playlist:</label>
<select name="playlist_id" id="playlist_id">
    <?php foreach ($playlists as $playlist) : ?>
        <option value="<?= $playlist['id'] ?>"><?= $playlist['name'] ?></option>
    <?php endforeach; ?>
</select>

<button type="submit">Remove from Playlist</button>
<?= form_close(); ?>

<?= $this->endSection(); ?>