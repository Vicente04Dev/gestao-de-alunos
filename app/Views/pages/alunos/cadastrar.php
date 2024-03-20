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

        <?= form_open('cadastro_alunos') ?>
        <?= csrf_field(); ?>

        <div class="row">

            <div class="mb-1 col-sm-6">
                <label for="nome">Nome do aluno</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="nome do aluno" value="<?= set_value('nome') ?>">
            </div>

            <div class="mb-1 col-sm-3">
                <label for="turno">Turno</label>
                <select class="form-select" id="turno" name="turno">
                    <option value="">Turno</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>
            <div class="mb-1 col-sm-3">
                <label for="turno">Curso</label>
                <select class="form-select" id="curso" aria-label="Floating label select example" name="curso">
                    <option value="Nenhum">Nenhum</option>
                    <option value="C.F.B">C.F.B</option>
                    <option value="C.E.J">C.E.J</option>
                    <option value="C.H">C.H</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-sm-3">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                    value="<?= set_value('data_nascimento') ?>">
            </div>
            <div class="mb-1 col-sm-3">
                <label for="classe">Classe</label>
                <select class="form-select" id="classe" aria-label="Floating label select example" name="classe">
                    <option value="">Classe</option>
                    <option value="7ª classe">7ª classe</option>
                    <option value="8ª classe">8ª classe</option>
                    <option value="9ª classe">9ª classe</option>
                    <option value="10ª classe">10ª classe</option>
                    <option value="11ª classe">11ª classe</option>
                    <option value="12ª classe">12ª classe</option>
                </select>
            </div>

            <div class="mb-1 col-sm-3">
                <label for="sala">Sala</label>
                <input type="text" class="form-control" id="sala" name="sala" placeholder="digite o nº da sala" value="<?= set_value('sala') ?>">
            </div>
            <div class="mb-1 col-sm-3">
                <label for="telefone">Nº de telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="nº de telefone" value="<?= set_value('telefone') ?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-1 col-sm-4">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao"
                    placeholder="localização do aluno" value="<?= set_value('localizacao') ?>">
            </div>
            <div class="mb-1 col-sm-4">
                <label for="encarregado">Encarregado</label>
                <select class="form-select" id="encarregado" aria-label="Floating label select example" name="encarregado">
                    <option value="">Encarregado</option>
                    <?php foreach($encarregados as $nomes): ?>
                        <option value="<?= $nomes->id ?>"><?= $nomes->nome ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3 col-sm-4">
                <label for="obs">Observações</label>
                <textarea class="form-control" name="obs" id="obs" placeholder="notas sobre o aluno (opcional)"><?= set_value('obs') ?></textarea>
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