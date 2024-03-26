<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= esc($pageTitle ?? 'Alunos') ?>
        </h2>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <!-- Modal -->
    <div class="bg-white p-3 mb-3 mt-3 border rounded">


        <?php if (validation_list_errors()): ?>
            <div class="text-danger">
                <?= validation_list_errors() ?? '' ?>
            </div>
        <?php endif ?>

        <form action="<?= base_url('cadastro_notas') ?>" method="post">
        <?= csrf_field(); ?>

        <div class="row">

            <div class="mb-1 col-sm-4">
                <label for="aluno_id">Nome do aluno</label>
                <select class="form-select" id="aluno_id" name="aluno_id">
                    <?php foreach($alunos as $aluno): ?>
                        <option value="<?= $aluno->id ?>"> <?= $aluno->nome ?> </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-1 col-sm-4">
                <label for="dsiciplina_id">Disciplina</label>
                <select class="form-select" id="disciplina_id" name="disciplina_id">
                    <?php foreach($disciplinas as $disciplina): ?>
                        <option value="<?= $disciplina->id ?>"> <?= $disciplina->nome ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-1 col-sm-2">
                <label for="trimeste">Trimeste</label>
                <select class="form-select" id="trimestre" name="trimestre">
                    <option value="Iº Trimeste">Iº Trimeste</option>
                    <option value="IIº Trimeste">IIº Trimeste</option>
                    <option value="IIIº Trimeste">IIIº Trimeste</option>
                </select>
            </div>
            <div class="mb-1 col-sm-2">
                <label for="ano_lectivo">Ano lectivo</label>
                <input type="text" class="form-control" name="ano_lectivo" id="ano_lectivo" value='<?= $ano_passado . "/" . $ano_actual ?>' readonly>
            </div>
        </div>

        <div class="row mb-2">
            <div class="mb-1 col-sm-2">
                <label for="mac">MAC</label>
                <input type="text" class="form-control" id="mac" name="mac" value="<?= set_value('mac') ?>"
                    placeholder="mac">
            </div>
            <div class="mb-1 col-sm-2">
                <label for="NPP">NPP</label>
                <input type="text" class="form-control" id="npp" name="npp" value="<?= set_value('npp') ?>"
                    placeholder="npp">
            </div>

            <div class="mb-1 col-sm-2">
                <label for="npt">NPT</label>
                <input type="text" class="form-control" id="npt" name="npt" placeholder="npt"
                    value="<?= set_value('npt') ?>">
            </div>
            <div class="col-sm-4">
                <label for="mt">MT</label>

                    <div class="input-group mb-3">
                        <button class="btn btn-primary btn-sm" type="button" onclick="calcularMediaTrimestre()" >Calcular MT</button>
                        <input type="text" class="form-control" placeholder="mt" id="mt" name="mt" value="<?= set_value('mt') ?>" readonly>
                    </div>
            </div>
        </div>

        <div class="d-column gap-2">
            <button class="btn btn-success btn-md" type="submit">Cadastrar nota</button>
        </div>

        </form>
    </div>

    <!-- /.Modal -->

    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>