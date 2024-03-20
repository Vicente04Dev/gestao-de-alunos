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
                <th scope="col">Usuário</th>
                <th scope="col">Senha</th>
                <th scope="col">Papel</th>
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
                        <?= $value->usuario ?>
                    </td>
                    <td>
                        <?= $value->senha ?>
                    </td>
                    <td>
                        <?= $value->papel ?>
                    </td>
                    <td>  
                        <a href="editar_encarregado/<?= $value->id ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="apagar_user/<?= $value->id ?>" class="btn btn-danger btn-sm" value="<?= $value->id ?>" >Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>

<?= $this->endSection() ?>