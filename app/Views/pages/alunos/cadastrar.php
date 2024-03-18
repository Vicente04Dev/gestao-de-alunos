<?= $this->extend('layouts/dashboard-layout'); ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h2>
            <?= esc($pageTitle ?? 'Alunos') ?>
        </h2>
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

        <?= form_open('cadastro_alunos', ['enctype' => 'multipart/form-data']) ?>
        <?= csrf_field(); ?>

        <div class="row">

            <div class="mb-1 col-sm-6">
                <label for="nome">Nome do aluno</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do aluno"
                    value="<?= set_value('nome') ?>">
                <span class="text text-danger">
                    <?= session()->getFlashdata('error')['nome'] ?? '' ?>
                </span>
            </div>

            <div class="mb-1 col-sm-3">
                <label for="turno">Turno</label>
                <select class="form-select" id="turno" name="turno">
                    <option value=""></option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['turno'] ?? '' ?>
                </span>
            </div>
            <div class="mb-1 col-sm-3">
                <label for="turno">Curso</label>
                <select class="form-select" id="curso" aria-label="Floating label select example" name="curso">
                    <option value=""></option>
                    <option value="C.F.B">C.F.B</option>
                    <option value="C.E.J">C.E.J</option>
                    <option value="C.H">C.H</option>
                </select>
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['curso'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-sm-3">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                    value="<?= set_value('data_nascimento') ?>">
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['data_nascimento'] ?? '' ?>
                </span>
            </div>
            <div class="mb-1 col-sm-3">
                <label for="classe">Classe</label>
                <select class="form-select" id="classe" aria-label="Floating label select example" name="classe">
                    <option value=""></option>
                    <option value="7ª classe">7ª classe</option>
                    <option value="8ª classe">8ª classe</option>
                    <option value="9ª classe">9ª classe</option>
                    <option value="10ª classe">10ª classe</option>
                    <option value="11ª classe">11ª classe</option>
                    <option value="12ª classe">12ª classe</option>
                </select>
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['classe'] ?? '' ?>
                </span>
            </div>

            <div class="mb-1 col-sm-3">
                <label for="sala">Sala</label>
                <input type="text" class="form-control" id="sala" name="sala" placeholder="digite o nº da sala"
                    value="<?= set_value('sala') ?>">
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['sala'] ?? '' ?>
                </span>
            </div>
            <div class="mb-1 col-sm-3">
                <label for="telefone">Nº de telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="nº de telefone"
                    value="<?= set_value('telefone') ?>">
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['telefone'] ?? '' ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-sm-5">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao"
                    placeholder="localização do aluno" value="<?= set_value('localizacao') ?>">
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['localizacao'] ?? '' ?>
                </span>
            </div>
            <div class="mb-3 col-sm-7">
                <label for="obs">Observações</label>
                <textarea class="form-control" name="obs" id="obs"
                    placeholder="notas sobre o aluno (opcional)"><?= set_value('obs') ?></textarea>
                <span class="text text-danger">
                    <?= session()->getFlashdata('erro_cadastro_aluno')['obs'] ?? '' ?>
                </span>
            </div>

            <div class="col-sm-5 mb-2">
                <label for="foto">Foto do aluno</label>
                <div class="text-left mb-2">
                    <img src="images/wilson.jpg" alt="" width="200" height="150" id="imagem">
                </div>
                <input type="file" class="form-control" name="imagem" onchange="previewImagem()">
            </div>

        </div>


        <div class="d-column gap-2">
            <button class="btn btn-success btn-md" type="submit">Cadastrar aluno</button>
            <button class="btn btn-primary btn-md">Novo cadastro</button>
        </div>

        <?= form_close() ?>
    </div>

    <!-- /.Modal -->

    <!-- Tabela de usuários -->

    <!-- /.Tabela de usuários -->
</div>

<?= $this->endSection() ?>