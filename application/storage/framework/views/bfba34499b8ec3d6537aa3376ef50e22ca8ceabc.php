<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        APPLICATIONS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Applications</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            All Applications
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
        <table class="table table-borderless table-striped js-dataTable-responsive">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?> 
            <?php if(count($archived)>0): ?>
                <tr>
                    <th class="text-uppercase">Applicant Name</th>
                    <th class="text-uppercase">department</th>
                    <th class="text-uppercase">course</th>
                    <th class="text-uppercase">Status</th>
                   
                </tr>
                <?php $__currentLoopData = $archived; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                   
                        <tr class="text-uppercase">
                            <td> <?php echo e($item->applicant->sname); ?> <?php echo e($item->applicant->fname); ?> <?php echo e($item->applicant->mname); ?></td>
                            <td> <?php echo e($item->department); ?></td>
                            <td> <?php echo e($item->course); ?></td>
                            <td> <?php if($item->registrar_status ==1): ?><a  class="badge badge-sm bg-info" >Archived</a>
                                <?php endif; ?>
                            </td>
                         
                          </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <small class="text-center text-muted">There are no archived appications</small>
            </tr>
            <?php endif; ?>
    </table>
    <?php echo e($archived->links('pagination::bootstrap-5')); ?>

            </div>
           
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tum/application/Modules/Courses/Resources/views/offer/archived.blade.php ENDPATH**/ ?>