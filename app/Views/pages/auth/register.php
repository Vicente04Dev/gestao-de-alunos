<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

<!--FORMULÁRIO DE LOGIN-->

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Cadastrar
                </span>
            </div>

            <form class="login100-form validate-form" method="post" action="<?= route_to('register') ?>">
                <?= csrf_field() ?>
                <?= session()->getFlashdata('erro_cadastro') ?>
                <?= validation_list_errors() ?>
                <?php if (session()->has('erro_cadastro')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('erro_cadastro') ?>
                    </div>
                <?php endif ?>
                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" value="<?= set_value('email') ?>"
                        placeholder="digite seu email">
                    <span class="focus-input100"></span>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('erros')['email'] ?? '' ?>
                    </span>
                </div>
                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">Nome</span>
                    <input class="input100" type="text" name="nome" <?= set_value('nome') ?>
                        placeholder="digite seu nome">
                    <span class="focus-input100"></span>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('erros')['nome'] ?? '' ?>
                    </span>
                </div>

                <div class="wrap-input100 validate-input m-b-18">
                    <span class="label-input100">Senha</span>
                    <input class="input100" type="password" name="senha" <?= set_value('senha') ?>
                        placeholder="Digite sua senha">
                    <span class="focus-input100"></span>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('erros')['senha'] ?? '' ?>
                    </span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div>
                        Já tem uma conta?
                        <a href="<?= route_to('login'); ?>" class="txt1">
                            Entrar
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>