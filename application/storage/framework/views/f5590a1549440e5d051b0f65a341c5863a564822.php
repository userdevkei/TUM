<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Courses
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Courses</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            All Courses
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
            <table class="table table-borderless table-striped js-dataTable-responsive">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?> 
                <?php if(count($availables)>0): ?>
                    <tr>
                        <th class="text-uppercase">Course name</th>
                        <th class="text-uppercase">Department</th>
                        <th class="text-uppercase" >School</th>
                        <th class="text-uppercase">Duration</th>
                    </tr>
                    <?php $__currentLoopData = $availables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-uppercase"> <?php echo e($item->course_name); ?></td>
                                <td class="text-uppercase"> <?php echo e($item->department_id); ?></td>
                                <td class="text-uppercase" > <?php echo e($item->school_id); ?></td>
                                <td class="text-uppercase"> <?php echo e($item->course_duration); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <small class="text-center text-muted">There are no courses on offer</small>
                </tr>
                <?php endif; ?>
        </table>
        
        </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tum/application/Modules/Courses/Resources/views/offer/coursesOffer.blade.php ENDPATH**/ ?>