<?php $__env->startSection('content'); ?>

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <div class="flex-grow-1">
                <h5 class="h5 fw-bold mb-0">
                    CLASSES
                </h5>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Classes</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View classes
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
 <!-- Main Container -->
 
<main id="main-container">
    <!-- Page Content -->
   
      <!-- Dynamic Table Responsive -->
      <div class="block block-rounded">
       
        <div class="block-content block-content-full">
          <div class="row">
            <div class="col-12">
          <table class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
            <span class="d-flex justify-content-end">
                <a class="btn btn-alt-info btn-sm" href="<?php echo e(route('courses.addClasses')); ?>">Create</a>
            </span><br>
            <thead>
              <tr>
                <th tyle="text-transform: uppercase">Course</th>
                
                <th tyle="text-transform: uppercase">Classes</th>
              </tr>
            </thead>
            <tbody><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="text-transform: uppercase"class="fw-semibold fs-sm"><?php echo e($class->course_id); ?></td>
                
                <td style="text-transform: uppercase" class="fw-semibold fs-sm"><?php echo e($class->name); ?></td>
                <td> <a class="btn btn-sm btn-alt-info" href="<?php echo e(route('courses.editClasses', $class->id)); ?>">edit</a> </td>
                <td> <a class="btn btn-sm btn-alt-danger" href="<?php echo e(route('courses.destroyClasses', $class->id)); ?>">delete</a> </td> 
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
            </tbody>
          </table>
          <?php echo e($data->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
      </div>
      <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
  <!-- END Main Container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tumNew/Modules/Courses/Resources/views/class/showClasses.blade.php ENDPATH**/ ?>