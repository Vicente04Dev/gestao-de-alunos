<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/" class="d-block">
          <?php if (session()->has('user')): ?>
            <?= session()->get('user')['nome']; ?>
          <?php endif ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item">
          <a href="<?= route_to('admin') ?>"
            class="nav-link <?= current_url() == base_url('admin') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Alunos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= route_to('alunos') ?>"
                class="nav-link <?= current_url() == base_url('alunos') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('lista_alunos') ?>"
                class="nav-link <?= current_url() == base_url('lista_alunos') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de alunos</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Encarregados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= route_to('encarregados') ?>"
                class="nav-link <?= current_url() == base_url('encarregados') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('encarregados/lista') ?>"
                class="nav-link <?= current_url() == base_url('encarregados/lista') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista dos encarregados</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Professores
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= route_to('professores') ?>"
                class="nav-link <?= current_url() == base_url('professores') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('professores/lista') ?>"
                class="nav-link <?= current_url() == base_url('professores/lista') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista dos professores</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Usuários
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= route_to('users') ?>"
                class="nav-link <?= current_url() == base_url('users') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= route_to('alunos/lista') ?>"
                class="nav-link <?= current_url() == base_url('alunos/lista') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de usuários</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>