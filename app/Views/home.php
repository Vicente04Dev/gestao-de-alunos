<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<h1>content here</h1>

<?= current_url() ?> <br>
<?= base_url('/') ?>
<?= $this->endSection() ?>