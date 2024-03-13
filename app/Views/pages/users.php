<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 g-2">
            <div class="col-sm-6">
                <h2>
                    <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
                </h2>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb float-md-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2 mb-1">Addicionar usuário</a></li>
                    <li>
                        <a href="#" class="btn btn-success btn-sm mr-2">Exportar</a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-success btn-sm">Exportar</a>
                    </li>
                </ul>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Tabela de usuários -->

<div class="container">
    
</div>
<!-- /.Tabela de usuários -->

<?= $this->endSection() ?>