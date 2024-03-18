<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 g-2">
            <div class="col-sm-6">
                <h2>
                    <?= esc(isset($pageTitle) ? $pageTitle : 'Alunos'); ?>
                </h2>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb float-md-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2 mb-1" data-bs-toggle="modal"
                            data-bs-target="#modal_novo_usuario">Addicionar usuário</a></li>
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

<!-- Tabela de usuários -->

<div class="container">
    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal_novo_usuario" tabindex="-1"
        aria-labelledby="titulo" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo">Cadastrando novo usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">

                            <div class="mb-1 col-sm-3">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do usuário">
                            </div>
                            <div class="mb-1 col-sm-3">
                                <label for="nome">Nome de usuário</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome de acesso">
                            </div>
                            <div class="mb-1 col-sm-3">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="senha de acesso">
                            </div>
                            <div class="mb-1 col-sm-3">
                                <label for="papel">Papel</label>
                                <select class="form-select" id="papel" name="papel">
                                    <option value="2">Professor</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Cadastrar usuário</button>
                        <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.Tabela de usuários -->

<?= $this->endSection() ?>