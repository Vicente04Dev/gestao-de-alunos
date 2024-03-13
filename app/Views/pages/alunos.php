<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
        </h2>
        <div class="row mb-2">
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Curso</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Classe</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Turno</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <button class="btn btn-primary btn-sm">Aplicar filtro</button>
            </div><!-- /.col -->
            <div class="col-sm-4">
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