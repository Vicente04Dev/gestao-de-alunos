<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= isset($pageTitle) ? $pageTitle : 'Documento' ?>
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap-5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/my.css">
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'navbar.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?= $this->renderSection('content'); ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?= include 'footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="js/jquery.js"></script>

  <!-- Código para mostrar o preview da imagem -->
  <script src="js/sweetalert.min.js"></script>
  <script>

    $(document).ready(() => {
      <?php if (session()->getFlashdata('status')): ?>
        swal({
          title: "<?= session()->getFlashdata('status') ?>",
          text: "<?= session()->getFlashdata('status_text') ?>",
          icon: "<?= session()->getFlashdata('status_icon') ?>",
          button: "<?= session()->getFlashdata('status_button') ?>",
        })
      <?php endif ?>

      $('.delete').click((e) => {
        e.preventDefault();

        console.log($(this).get().values());

        let id = $(this).val();

        console.log('id: '+id)

        swal({
          title: "Ten certeza que quer apagar esses dados?",
          text: "Uma vez pagados, os dados não podereão ser recuperados!",
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        }).then((apagar) => {
          if(apagar) {
            $.ajax({
              url: '/aluno/apagar/' + id,
              success: function (response) {
                swal({
                  title: response.title,
                  text: response.text,
                  icon: response.icon,
                  button: 'OK',
                }).then((apagado) => {
                  window.location.reload();
                });
              }
            });
          } else {
            console.log('Olá mundo!!')
          }
        })
      })
    })

    function previewImagem() {
      let imagem = document.querySelector('input[name=imagem]').files[0];
      let preview = document.querySelector('#imagem');

      let reader = new FileReader();

      reader.onloadend = () => {
        preview.src = reader.result;
      }

      if (imagem) {
        reader.readAsDataURL(imagem);
      } else {
        preview.src = "";
      }
    }
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="css/bootstrap-5/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="js/datatables.min.js"></script>
</body>

</html>