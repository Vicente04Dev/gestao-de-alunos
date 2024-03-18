<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
        </h2>
        <div class="row mb-2 g-2">
            <div class="col-sm-3">
                <select class="form-select form-select-sm">
                    <option selected>Turno</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Manhã e Tarde">Manhã e tarde</option>
                    <option value="Tarde e Noite">Tarde e noite</option>
                    <option value="Manhã e Noite">Manhã e noite</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-3">
                <button class="btn btn-primary btn-sm">Aplicar filtro</button>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ul class="breadcrumb float-sm-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2" data-bs-toggle="modal"
                            data-bs-target="#modal_novo_professor">Addicionar professor</a></li>
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
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal_novo_professor" tabindex="-1"
        aria-labelledby="titulo" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo">Cadastrando professor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">

                            <div class="mb-1 col-sm-4">
                                <label for="nome">Nome do professor</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do professor">
                            </div>

                            <div class="mb-1 col-sm-4">
                                <label for="data_nascimento">Data de nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
                            </div>
                            <div class="mb-1 col-sm-4">
                                <label for="nivel">Nível acadêmico</label>
                                <input type="text" class="form-control" name="nivel" id="nivel" placeholder="nível acadêmico do professor">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-1 col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" class="form-control" id="telefone"
                                    placeholder="nº de telefone do professor">
                            </div>
                            <div class="mb-1 col-sm-4">
                                <label for="localizacao">Localização</label>
                                <input type="text" class="form-control" name="localizacao" id="localizacao"
                                    placeholder="onde o professor mora?">
                            </div>
                            <div class="mb-3 col-sm-4">
                                <label for="obs">Observações</label>
                                <textarea class="form-control" name="obs" id="obs"
                                placeholder="notas sobre o professor (opcional)" cols="30" ></textarea>
                            </div>
                            
                            <div class="col-sm-5 mb-2">
                                <div class="text-left mb-2">
                                    <img src="images/wilson.jpg" alt="imagem do professor" width="200" height="150" id="imagem">
                                </div>
                                <input type="file" class="form-control" name="imagem" onchange="previewImagem()">
                            </div>
                            <div class="mb-2 col-sm-4">
                                <label for="usuario">Usuário do professor</label>
                                <select class="form-select" id="turno" name="usuario">
                                    <option value="1">Manhã</option>
                                    <option value="2">Tarde</option>
                                    <option value="3">Noite</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Cadastrar professor</button>
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