<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= isset($pageTitle) ? $pageTitle : 'Alunos' ?>
        </h2>
        <div class="row mb-2 g-2">
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Curso</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Classe</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <select class="form-select form-select-sm">
                    <option selected>Turno</option>
                    <option value="Ciências Físicas e Biológicas">C.F.B</option>
                    <option value="Ciências Económicas e Jurídicas">C.E.J</option>
                    <option value="Ciências Humanas">C.H</option>
                </select>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <button class="btn btn-primary btn-sm">Aplicar filtro</button>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ul class="breadcrumb float-sm-right">
                    <li><a href="#" class="btn btn-success btn-sm mr-2" data-bs-toggle="modal"
                            data-bs-target="#modal_novo_aluno">Addicionar aluno</a></li>
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
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal_novo_aluno" tabindex="-1"
        aria-labelledby="titulo" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo">Cadastrando aluno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= validation_list_errors() ?>
                    <?= form_open('alunos/cadastro', ['enctype' => 'multipart/form-data']) ?>
                    <?= csrf_field(); ?>

                    <div class="row">

                        <div class="mb-1 col-sm-4">
                            <label for="nome">Nome do aluno</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do aluno" value="<?= set_value('nome') ?>">
                        </div>

                        <div class="mb-1 col-sm-4">
                            <label for="turno">Turno</label>
                            <select class="form-select" id="turno" name="turno">
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                        </div>
                        <div class="mb-1 col-sm-4">
                            <label for="turno">Curso</label>
                            <select class="form-select" id="curso" aria-label="Floating label select example"
                                name="curso">
                                <option value="1">Nenhum</option>
                                <option value="C.F.B">C.F.B</option>
                                <option value="C.E.J">C.E.J</option>
                                <option value="C.H">C.H</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-sm-4">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= set_value('data_nascimento') ?>">
                        </div>
                        <div class="mb-1 col-sm-4">
                            <label for="classe">Classe</label>
                            <select class="form-select" id="classe" aria-label="Floating label select example"
                                name="classe">
                                <option value="1">Classe</option>
                                <option value="7ª classe">7ª classe</option>
                                <option value="8ª classe">8ª classe</option>
                                <option value="9ª classe">9ª classe</option>
                                <option value="10ª classe">10ª classe</option>
                                <option value="11ª classe">11ª classe</option>
                                <option value="12ª classe">12ª classe</option>
                            </select>
                        </div>

                        <div class="mb-1 col-sm-4">
                            <label for="sala">Sala</label>
                            <input type="text" class="form-control" id="sala" name="sala"
                                placeholder="digite o nº da sala" value="<?= set_value('sala') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-sm-4">
                            <label for="telefone">Nº de telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone"
                                placeholder="nº de telefone" value="<?= set_value('telefone') ?>">
                        </div>
                        <div class="mb-1 col-sm-4">
                            <label for="localizacao">Localização</label>
                            <input type="text" class="form-control" id="localizacao" name="localizacao"
                                placeholder="localização do aluno" value="<?= set_value('localizacao') ?>">
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="obs">Observações</label>
                            <textarea class="form-control" name="obs" id="obs"
                                placeholder="notas sobre o aluno (opcional)" cols="30"><?= set_value('obs') ?></textarea>
                        </div>

                        <div class="col-sm-5 mb-2">
                            <div class="text-left mb-2">
                                <label for="foto">Foto do aluno</label>
                                <img src="images/wilson.jpg" alt="" width="200" height="150" id="imagem">
                            </div>
                            <input type="file" class="form-control" name="imagem" onchange="previewImagem()">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Cadastrar aluno</button>
                    <button type="button" class="btn btn-danger btn-md" data-bs-dismiss="modal">Sair</button>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <!-- /.Modal -->

    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>