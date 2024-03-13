<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
        </h2>
        <div class="row mb-2 g-2">
            <div class="col-sm-3">
                <select class="form-select form-select-sm">
                    <option selected>Turno</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Manhã e Tarde">Manhã e tarde</option>
                    <option value="Tarde e Noite">Tarde e noite</option>
                    <option value="Manhã e Noite">Manhã e noite</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-3">
                <button class="btn btn-primary btn-sm">Aplicar filtro</button>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ul class="breadcrumb float-sm-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2">Addicionar aluno</a></li>
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

<?= $this->endSection() ?>