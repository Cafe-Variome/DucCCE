<?php

/**
 * @author Umar Riaz
 * Created at 14/07/2021
 * This is the master layout for Duc
 */
?>
<!doctype html>
<html>

<head>
    <title>Duc Profiler</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/site.css') ?>?v=<?php echo rand() ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>?v=<?php echo rand() ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/conbtn.css') ?>?v=<?php echo rand() ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/tag/bootstrap-tagsinput.css') ?>"> -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script> -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Select2 css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
    <script src="<?php echo base_url('public/js/jsonFormation.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/formJs.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/pops.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/summary.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/comFunctions.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/conbtn.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/validate.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/conditon.js') ?>?v=<?php echo rand() ?>"></script>
    <script src="<?php echo base_url('public/js/tags.js') ?>?v=<?php echo rand() ?>"></script>



    <script src="http://cdnjs.cloudfare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script> -->
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body class="hold-transition d-flex flex-column h-100">


    <header>
        <?= $this->include('temp/nav') ?>
    </header>
    <main role="main flex-shrink-0">
        <section class="content">
            <div id="con">
                <?= $this->include('temp/alerts') ?>
                <?= $this->renderSection('content') ?>
            </div><!-- /.container-fluid -->
        </section>
    </main>

</body>
</html>