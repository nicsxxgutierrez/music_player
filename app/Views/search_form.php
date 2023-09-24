<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1>Search Music</h1>

<?= form_open('music/search'); ?>
<label for="search_title">Search by Title:</label>
<input type="text" name="search_title" id="search_title">

<label for="search_artist">Search by Artist:</label>
<input type="text" name="search_artist" id="search_artist">

<button type="submit">Search</button>
<?= form_close(); ?>

<?= $this->endSection(); ?>