<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>
                    <?= esc($pageTitle) ?? 'Alunos'; ?>
                </h2>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Tabela de usuários -->

<div class="container">
    <!-- Modal -->
    <div class="bg-white p-3 mb-3 mt-3 border rounded">
        <?php if (validation_list_errors()): ?>
            <div class="text-danger">
                <?= validation_list_errors() ?? '' ?>
            </div>
        <?php endif ?>

        <?= form_open('cadastro_users') ?>
        <?= csrf_field(); ?>

        <div class="row mb-3">

            <div class="mb-1 col-sm-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do usuário" value="<?= set_value('nome')?>">
            </div>
            <div class="mb-1 col-sm-6">
                <label for="usuario">Nome de usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="nome de acesso" value="<?= set_value('usuario')?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="mb-1 col-sm-4">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="senha de acesso" value="<?= set_value('senha')?>">
            </div>
            <div class="mb-1 col-sm-4">
                <label for="confirma_senha">Confirmar senha</label>
                <input type="password" class="form-control" name="confirma_senha" id="confirma_senha" placeholder="confirme a senha de acesso" value="<?= set_value('confirma_senha')?>">
            </div>
            <div class="mb-1 col-sm-4">
                <label for="papel">Papel</label>
                <select class="form-select" id="papel" name="papel">
                    <option value="professor">Professor</option>
                    <option value="adm">Administrador</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md">Cadastrar usuário</button>
        <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Sair</button>
        <?= form_close() ?>
    </div>
</div>
<!-- /.Tabela de usuários -->

<?= $this->endSection() ?>