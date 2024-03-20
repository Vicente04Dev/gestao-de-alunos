<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 g-2">
            <div class="col-sm-6">
                <h2>
                    <?= esc($pageTitle) ?? 'Alunos' ?>
                </h2>
            </div>
        </div><!-- /.row -->
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

        <?= form_open('cadastro_professor') ?>

        <div class="row">

            <div class="mb-1 col-sm-4">
                <label for="nome">Nome do professor</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do professor" value="<?= set_value('nome') ?>">
            </div>

            <div class="mb-1 col-sm-4">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?= set_value('data_nascimento') ?>">
            </div>
            <div class="mb-1 col-sm-4">
                <label for="nivel">Nível acadêmico</label>
                <input type="text" class="form-control" name="nivel" id="nivel" placeholder="nível acadêmico do professor" value="<?= set_value('nivel') ?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-sm-4">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="telefone"
                    placeholder="nº de telefone do professor" value="<?= set_value('telefone') ?>">
            </div>
            <div class="mb-1 col-sm-4">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" name="localizacao" id="localizacao"
                    placeholder="onde o professor mora?" value="<?= set_value('localizacao') ?>">
            </div>
            <div class="mb-3 col-sm-4">
                <label for="obs">Observações</label>
                <textarea class="form-control" name="obs" id="obs" placeholder="notas sobre o professor (opcional)"
                    cols="30"><?= set_value('obs') ?></textarea>
            </div>
            <div class="mb-2 col-sm-4">
                <label for="usuario">Usuário do professor</label>
                <select class="form-select" id="usuario" name="usuario">
                    <?php foreach($usuarios as $nomes): ?>
                        <option value="<?= $nomes->id ?>"><?= $nomes->nome ?></option>
                    <?php endforeach ?>
                </select>
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-md">Cadastrar professor</button>
        <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Sair</button>
        <?= form_close() ?>

    </div>

    <!-- /.Modal -->

    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>