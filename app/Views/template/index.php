<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <title>Gentelella Alela!</title>
        <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('build/css/custom.min.css') ?>" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php echo $this->include('template/sidebar'); ?>
                <?php echo $this->include('template/top'); ?>
                <?php echo $this->renderSection('content'); ?>
                <?php echo $this->include('template/foot'); ?>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js') ?>"></script>
        <script src="<?php echo base_url('vendors/nprogress/nprogress.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Chart.js/dist/Chart.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/gauge.js/dist/gauge.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/iCheck/icheck.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/skycons/skycons.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Flot/jquery.flot.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Flot/jquery.flot.pie.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Flot/jquery.flot.time.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Flot/jquery.flot.stack.js') ?>"></script>
        <script src="<?php echo base_url('vendors/Flot/jquery.flot.resize.js') ?>"></script>
        <script src="<?php echo base_url('vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
        <script src="<?php echo base_url('vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/flot.curvedlines/curvedLines.js') ?>"></script>
        <script src="<?php echo base_url('vendors/DateJS/build/date.js') ?>"></script>
        <script src="<?php echo base_url('vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
        <script src="<?php echo base_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
        <script src="<?php echo base_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
        <script src="<?php echo base_url('vendors/moment/min/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
        <script src="<?php echo base_url('build/js/custom.min.js') ?>"></script>

    </body>
</html>
