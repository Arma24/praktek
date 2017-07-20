<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Armaningtyas Utami</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Pemesanan Tiket Pesawat</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Armaningtyas Utami <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <li>
                      <a href="<?php echo base_url();?>index.php/transaksi/transaksi"> Transaksi</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url();?>index.php/laporan/laporan"> Laporan</a>
                  </li>
                  
            <!-- Super Admin -->
            <?php if ($this->session->userdata('jabatan') == 'admin') {
              echo '<li>
                  <a href="'.base_url().'index.php/user/user"> User</a>
              </li>
              <li>
                      <a href="'.base_url().'index.php/maskapai/maskapai"> Maskapai</a>
              </li>
              <li>
                  <a href="'.base_url().'index.php/jadwal/jadwal"> Jadwal Penerbangan</a>
              </li>';
            } ?>

            <!-- Super Admin -->
                  <li>
                      <a href="<?php echo base_url();?>index.php/admin/logout"> Logout</a>
                  </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

            <!-- CONTENT BODY -->
            <?php
                    $this->load->view($main_view);
            ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- jQuery -->
     <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

     <!-- Bootstrap Core JavaScript -->
     <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

     <!-- Morris Charts JavaScript -->
     <script src="<?php echo base_url();?>assets/js/plugins/morris/raphael.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/morris/morris.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/morris/morris-data.js"></script>

     <!-- Flot Charts JavaScript -->
     <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
     <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
     <script src="<?php echo base_url();?>assets/js/plugins/flot/flot-data.js"></script>

</body>

</html>
