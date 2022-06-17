
<?php $__env->startSection('content'); ?>
    <!-- Page Content -->

    <link href="<?php echo e(asset('/css/index.css')); ?>" rel="stylesheet" />
    <script src = "<?php echo e(asset('/js/plugins/chart.js/Chart.min.js')); ?>" ></script>
    <script src = "<?php echo e(asset('/js/utils.js')); ?>" ></script>
    <script src = "<?php echo e(asset('jquery.js')); ?>" ></script>

    <div class="content-force">
        <div class="cod">
            <img src = '/Images/counter.svg' alt = 'COD' class = 'image-headers'>
            <h3>WELCOME, COD</h3>
        </div>
        <div id = 'preview-cod'>
            <section>
                <div id = 'name-preview'>
                    <a href = '<?php echo e(route('approval.pending')); ?>'><h4>Pending</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#006600;'>
                    <img src = '<?php echo e(asset('/Images/apply.png')); ?>' alt = 'Application Card'>
                </div>
            </section>
            <section>
                <div id = 'name-preview'>
                    <a href = '<?php echo e(route('approval.approved')); ?>'><h4>Approved</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#ffa144;'>
                    <img src = '<?php echo e(asset('/Images/cap.png')); ?>' alt = 'Application Card'>
                </div>
            </section>
            <section>
                <div id = 'name-preview'>
                    <a href = '<?php echo e(route('approval.rejected')); ?>'><h4>Rejected</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#006600;'>
                    <img src = '<?php echo e(asset('/Images/apply.png')); ?>' alt = 'Application Card'>
                </div>
            </section>
        </div>
        <div id = 'graph-cod'>
            <canvas id = 'pie-cod'></canvas>
            <canvas id = 'bar-cod'></canvas>
        </div>
    </div>
    <!-- END Page Content -->

    <script src = "<?php echo e(asset('/js/build.js')); ?>"></script>
    <script>
        buildGraph();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('approval::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TUM\Modules/Approval\Resources/views/cod/index.blade.php ENDPATH**/ ?>