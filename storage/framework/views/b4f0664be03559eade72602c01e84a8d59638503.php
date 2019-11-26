<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>PT. Maja Raya Indah Semesta</title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/toastr.min.css')); ?>">

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body data-spy="scroll" data-target="#sidemenu" data-offset="15">

<div id="app">
<?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container h-10" id="content">
    <div class="row h-100 mt-5">
        <?php echo $__env->make('layouts.partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <main class="col py-5">
            <div class="row">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>
</div>
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

    <script src="<?php echo e(url('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>
    <!-- Scripts -->
    <script src="<?php echo e(url('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/jquery.fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/printThis.js')); ?>"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <?php echo $__env->yieldContent('footer-script'); ?> 
</body>
</html>
