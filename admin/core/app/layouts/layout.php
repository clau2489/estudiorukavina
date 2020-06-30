<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- css Admin -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!--Plugins extra -->

    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='plugins/fullcalendar/moment.min.js'></script>
    <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
    <!--  pickadate -->
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
    <link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
    <script src='plugins/pickadate/picker.js'></script>
    <script src='plugins/pickadate/picker.date.js'></script>
    <script src='plugins/pickadate/picker.time.js'></script>
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css"/>
    <script src='plugins/select2/select2.min.js'></script>
    <script type="text/javascript">
    $(document).ready(function(){
    });
    </script>
  </head>

  <body class="<?php if(isset($_SESSION["user_id"])  ):?><?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <?php if(isset($_SESSION["user_id"])):?>

      <!-- Header administrador -->  
      <header class="main-header">
        <a href="./" class="logo">
          <span class="logo-mini"></span>
          <span class="logo-lg"><b>Administracion</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class=""><?php 
                  if(isset($_SESSION["user_id"])){ echo UserData::getById($_SESSION["user_id"])->name; }

                  ?></span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-right">
                      <?php if(isset($_SESSION["medic_id"])):?>
                    <?php endif; ?>
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <!-- Aside administrador -->
      <aside class="main-sidebar">
        <section class="sidebar">
        <ul class="sidebar-menu">
          <?php if(isset($_SESSION["user_id"])):?>
          <?php $u = UserData::getById($_SESSION["user_id"]); ?>
          <li><a href="./index.php?view=home"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>
          <li><a href="./index.php?view=posts&opt=all"><i class='fa fa-file-text'></i> <span>Articulos</span></a></li>
          <li><a href="./index.php?view=comments"><i class='fa fa-comment'></i> <span>Comentarios</span></a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-th-list"></i>
              <span>Catalogos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="./?view=categories&opt=all"><i class="fa fa-circle-o"></i> Categorias</a></li>
            </ul>
          </li>
          <li><a href="./?view=users"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
          <?php endif; ?>
        </ul>
        </section>
      </aside>


      <?php endif;?>
      <?php if(isset($_SESSION["user_id"])   ):?>
      <div class="content-wrapper">
        <?php View::load("index");?>
      </div>

      <!-- Pie del panel de administracion-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> v1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="http://www.oestedev.com" target="_blank">Oeste-DEV</a></strong>
      </footer>


      <?php else:?>
      <?php if(isset($_GET["view"]) && $_GET["view"]=="pacientlogin"):?>
      <?php elseif(isset($_GET["view"]) && $_GET["view"]=="mediclogin"):?>
      <?php else:?>


      <!-- Inicio de Sesion -->  
      <div class="login-box">
        <div class="login-logo">
            <img src="dist/img/logo.jpg" width="100%">
        </div>
        <hr>
        <div class="login-box-body">
          <form action="./?action=processlogin" method="post">
            <div class="form-group has-feedback">
              <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" required class="form-control" placeholder="Password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <a class="btn btn-danger btn-block btn-flat" href="../index.php">Volver</a>
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button> 
              </div>
            </div>
          </form>   
        </div>
        <hr>
        <a href="http://www.oestedev.com" style="color: black; text-align: right;">Powered by <img src="dist/img/oestedev.png" style="width: 60px"></a>
      </div>

      <?php endif;?>
      <?php endif;?>
    </div>

    <!-- scripts de bootstrap-->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pickadate").pickadate({format: 'yyyy-mm-dd',min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>'});
        $(".pickatime").pickatime({format: 'HH:i',interval: 10 });
      })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
  </body>
</html>

