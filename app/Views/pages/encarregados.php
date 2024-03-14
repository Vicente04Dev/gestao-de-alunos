<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>
                    <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
                </h2>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb float-md-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2 mb-2" data-bs-toggle="modal"
                            data-bs-target="#modal_novo_encarregado">Addicionar encarregado</a></li>
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

<div class="container">
    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal_novo_encarregado" tabindex="-1"
        aria-labelledby="titulo" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo">Cadastrando encarregado de educação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">

                            <div class="mb-1 col-sm-4">
                                <label for="nome">Nome do encarregado</label>
                                <input type="text" class="form-control" id="nome" placeholder="nome do encarregado">
                            </div>

                            <div class="mb-1 col-sm-4">
                                <label for="data_nascimento">Data de nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento">
                            </div>
                            <div class="mb-1 col-sm-4">
                                <label for="profissao">Profissão</label>
                                <input type="text" class="form-control" id="profissao" placeholder="profissão do encarregado">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-1 col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone"
                                    placeholder="nº de telefone do encarregado">
                            </div>
                            <div class="mb-1 col-sm-4">
                                <label for="localizacao">Localização</label>
                                <input type="text" class="form-control" id="localizacao"
                                    placeholder="onde o encarregado mora?">
                            </div>
                            <div class="mb-3 col-sm-4">
                                <label for="obs">Observações</label>
                                <textarea class="form-control" name="" id="obs"
                                placeholder="notas sobre o encarregado (opcional)" cols="30" ></textarea>
                            </div>
                            
                            <div class="col-sm-5 mb-2">
                                <div class="text-left mb-2">
                                    <img src="images/wilson.jpg" alt="" width="200" height="150">
                                </div>
                                <input type="file" class="form-control" name="imagem">
                            </div>
                            <div class="mb-2 col-sm-4">
                                <label for="usuario">Encarregandos</label>
                                <select class="form-select" id="turno" name="turno">
                                    <option value="1">Manhã</option>
                                    <option value="2">Tarde</option>
                                    <option value="3">Noite</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Cadastrar encarregado</button>
                        <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.Modal -->
    
    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>