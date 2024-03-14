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
                    <form>

                        <div class="row">

                            <div class="mb-1 col-sm-4">
                                <label for="nome">Nome do aluno</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do aluno">
                            </div>

                            <div class="mb-1 col-sm-2">
                                <label for="turno">Turno</label>
                                <select class="form-select" id="turno" name="turno">
                                    <option value="1">Manhã</option>
                                    <option value="2">Tarde</option>
                                    <option value="3">Noite</option>
                                </select>
                            </div>
                            <div class="mb-1 col-sm-3">
                                <label for="turno">Curso</label>
                                <select class="form-select" id="curso" aria-label="Floating label select example"
                                    name="curso">
                                    <option value="1">Nenhum</option>
                                    <option value="1">C.F.B</option>
                                    <option value="2">C.E.J</option>
                                    <option value="3">C.H</option>
                                </select>
                            </div>

                            <div class="mb-1 col-sm-3">
                                <label for="data_nascimento">Data de nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-sm-3">
                                <label for="sala">Sala</label>
                                <input type="text" class="form-control" id="sala" name="sala" placeholder="digite o nº da sala">
                            </div>
                            <div class="mb-1 col-sm-4">
                                <label for="localizacao">Localização</label>
                                <input type="text" class="form-control" id="localizacao" name="localizacao" 
                                    placeholder="localização do aluno">
                            </div>
                            <div class="mb-3 col-sm-5">
                                <label for="obs">Observações</label>
                                <textarea class="form-control" name="obs" id="obs"
                                    placeholder="notas sobre o aluno (opcional)" cols="30" ></textarea>
                            </div>

                            <div class="col-sm-5 mb-2">
                                <div class="text-left mb-2">
                                    <img src="images/wilson.jpg" alt="" width="200" height="150">
                                </div>
                                <input type="file" class="form-control" name="imagem">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Cadastrar aluno</button>
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