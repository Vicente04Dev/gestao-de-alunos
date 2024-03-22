<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="container-fluid">
            <h2>
                <?= esc($pageTitle ?? 'Cadastro de encarregados') ?>
            </h2>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <!-- Modal -->
    <div class="bg-white p-3 mb-3 mt-3 border rounded">

    <?php if(validation_list_errors()): ?>
            <div class="text-danger">
                <?= validation_list_errors() ?? '' ?>
            </div>
        <?php endif ?>

        <?= form_open('cadastro_encarregado') ?>

            <div class="row">

                <div class="mb-1 col-sm-4">
                    <label for="nome">Nome do encarregado</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="nome do encarregado" value="<?= $data->nome ?>" >
                </div>

                <div class="mb-1 col-sm-4">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?= $data->data_nascimento ?>">
                </div>
                <div class="mb-1 col-sm-4">
                    <label for="profissao">Profissão</label>
                    <input type="text" class="form-control" name="profissao" id="profissao"
                        placeholder="profissão do encarregado" value="<?= $data->profissao ?>">
                </div>
            </div>

            <div class="row">
                <div class="mb-1 col-sm-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone"
                        placeholder="nº de telefone do encarregado" value="<?= $data->telefone; ?>">
                </div>
                <div class="mb-1 col-sm-4">
                    <label for="localizacao">Localização</label>
                    <input type="text" class="form-control" name="localizacao" id="localizacao"
                        placeholder="onde o encarregado mora?" value="<?= $data->localizacao ?>">
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="obs">Observações</label>
                    <textarea class="form-control" name="obs" id="obs"
                        placeholder="notas sobre o encarregado (opcional)" cols="30"><?= $data->obs ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-md">Actualizar</button>
            <button class="btn btn-primary btn-md">Novo cadastro</button>
        <?= form_close() ?>

    </div>

    <!-- /.Modal -->

    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>