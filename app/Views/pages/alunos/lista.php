<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= esc($title ?? 'Lista') ?>
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
                <th scope="col">Classe</th>
                <th scope="col">Turno</th>
                <th scope="col">Telefone</th>
                <th scope="col">Sala</th>
                <th scope="col">Encarregado</th>
                <th scope="col">Ação</th>
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
                        <?= $value->classe ?>
                    </td>
                    <td>
                        <?= $value->turno ?>
                    </td>
                    <td>
                        <?= $value->telefone ?>
                    </td>
                    <td>
                        <?= $value->sala ?>
                    </td>
                    <td>
                        <a href="#"><?= $value->encarregado ?></a>
                    </td>
                    <td>  
                        <a href="aluno_editar/<?= $value->id ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="aluno/apagar/<?= $value->id ?>" class="btn btn-danger btn-sm" value="<?= $value->id ?>" >Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>

<?= $this->endSection() ?>