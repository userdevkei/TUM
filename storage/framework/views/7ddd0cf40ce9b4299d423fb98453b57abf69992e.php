
<?php $__env->startSection('content'); ?>
    <?php echo e(Auth::guard('user')->user()->name); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TUM\resources\views/student/index.blade.php ENDPATH**/ ?>