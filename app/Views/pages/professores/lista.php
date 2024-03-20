<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= esc($pageTitle ?? 'Lista') ?>
        </h2>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Nível acadêmico</th>
                <th scope="col">Telefone</th>
                <th scope="col">Localização</th>
                <th scope="col">Acção</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $value): ?>
                <tr>
                    <td scope="row">
                        <?= $value->id ?>
                    </td>
                    <td>
                        <?= $value->nome ?>
                    </td>
                    <td>
                        <?= $value->data_nascimento ?>
                    </td>
                    <td>
                        <?= $value->nivel_academico ?>
                    </td>
                    <td>
                        <?= $value->telefone ?>
                    </td>
                    <td>
                        <?= $value->localizacao ?>
                    </td>
                    <td>  
                        <a href="editar_encarregado/<?= $value->id ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="apagar_professor/<?= $value->id ?>" class="btn btn-danger btn-sm" value="<?= $value->id ?>" >Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>

<?= $this->endSection() ?>