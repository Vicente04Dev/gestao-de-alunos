<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">

    <div class="container text-center">
        <div class="alert alert-success">
            <h3><?= $title ?></h3>
            <p><?= $content ?></p>
            <p class="text-success"><?= anchor('alunos', 'Cadastrar novamente') ?></p>
        </div>
    </div>
    </div>
</div>

<?= $this->endSection() ?>