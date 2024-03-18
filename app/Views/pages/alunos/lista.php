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

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Classe</th>
                <th scope="col">Turno</th>
                <th scope="col">Telefone</th>
                <th scope="col">Sala</th>
                <th scope="col">Foto</th>
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
                    <td> <img width="75" src="uploads/imagens_alunos/<?= $value->imagem ?>" alt=""></td>
                    <td>

                        <a href="editar_aluno/<?= $value->id ?>" class="btn btn-primary btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm delete" value="<?= $value->id ?>" >Excluir</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>