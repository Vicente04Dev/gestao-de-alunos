<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

<!--FORMULÁRIO DE LOGIN-->

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Login
                </span>
            </div>

            <?= session()->getFlashdata('error') ?>
            <?= validation_list_errors() ?>
            <form class="login100-form validate-form" method="post" action="<?= route_to('loginStore') ?>">
                <?= csrf_field() ?>
                <?php if (session()->has('erro_login')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('erro_login') ?>
                    </div>
                <?php endif ?>
                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" value="<?= set_value('email') ?>"
                        placeholder="digite seu email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18">
                    <span class="label-input100">Senha</span>
                    <input class="input100" type="password" name="senha" value="<?= set_value('senha') ?>"
                        placeholder="Digite sua senha">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div>
                        Não tem uma conta?
                        <a href="<?= route_to('register'); ?>" class="txt1">
                            Cadastra-se
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>