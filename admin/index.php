<?php 
  require_once("inc/config.php");

  $titulo     = '';
  $texto      = '';
  $txtData    = '';
  $imagem     = '';
  $spanAtivo  = ''; 

  $query = "SELECT * FROM principal WHERE txtTitulo = ?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $query))
        exit('SQL error');

  $txtPesq = 'NAÇÃO CABINDA';

  mysqli_stmt_bind_param($stmt, 'i', $txtPesq);
  mysqli_stmt_execute($stmt);
  $res = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

  if($res){
      $titulo               = utf8_encode($res["txtTitulo"]);
      $texto                = utf8_encode(substr($res["txtTexto"], 0, 80)) . ' ...';
      $imagem               = $res["txtImagem"];
      $dataHoraCadastro     = $res["dataHoraCadastro"];
      $dataHoraAtualizacao  = $res["dataHoraAtualizacao"];

      if ( ($dataHoraCadastro < $dataHoraAtualizacao) || ($dataHoraCadastro == $dataHoraAtualizacao) ) {
        $txtData = 'Editado em ' . DataParaISO($dataHoraAtualizacao, '-');
      } else {
        $txtData = 'Criado em ' . DataParaISO($dataHoraCadastro, '-');
      }

      $ativo                = $res["ativo"];

      switch ($ativo) {
        case '1':
          $spanAtivo = "<span class='badge badge-success'>Ativo</span>";
          break;
        
        default:
          $spanAtivo = "<span class='badge badge-danger'>Inativo</span>";
          break;
      }

    mysqli_close($conn);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Centro Africano Oxalá e Iemanjá</title>

  <link rel="shortcut icon" href="../img/favicon_io/favicon-32x32.png" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <!--li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php require_once('src/pages/partials/sidebar-menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Textos da Página Inicial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Textos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!--div class="card-header">
          <h3 class="card-title">Textos da Página Inicial</h3>
          <div class="card-tools">
            <a class="btn btn-success btn-sm" href="#">
              <i class="fas fa-plus"></i>Incluir
            </a>
          </div>
        </div-->
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Título
                      </th>
                      <th style="width: 30%">
                          Texto
                      </th>
                      <th>
                          Imagem
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?=$titulo?>
                          </a>
                          <br/>
                          <small>
                              <?=$txtData?>
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <?=$texto?>
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <?=$imagem?>
                              </li>
                          </ul>
                      </td>
                      <td class="project-state">
                          <?=$spanAtivo?>
                      </td>
                      <td class="project-actions text-right">
                          <!--a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a-->
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <!--a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Excluir
                          </a-->
                      </td>
                  </tr>                  
                  
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
