<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <div class="h5 fw-bold mb-0">
                <h5>ATTENDANCES</h5>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Attendances</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View attendances
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<main id="main-container">
    <!-- Page Content -->
    
      <!-- Dynamic Table Responsive -->
      <div class="block block-rounded">
       
        <div class="block-content block-content-full">
          <div class="row">
            <div class="col-12">
          <table class="table table-borderless table-striped table-vcenter js-dataTable-responsive">
            <span class="d-flex justify-content-end">
                <a class="btn btn-alt-info btn-sm" href="<?php echo e(route('courses.addAttendance')); ?>">Create</a>
            </span><br>
            <thead>
                
              <tr>
                <th tyle="text-transform: uppercase">Attendance</th>
                <th tyle="text-transform: uppercase">Code</th>
              </tr>
              
            </thead>
            <tbody><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr> 
                <td style="text-transform: uppercase"> <?php echo e($attendance->attendance_name); ?></td>
                <td style="text-transform: uppercase"> <?php echo e($attendance->attendance_code); ?></td>
                <td> <a class="btn btn-sm btn-alt-info" href="<?php echo e(route('courses.editAttendance', $attendance->id)); ?>">edit</a> </td>
                <td> <a class="btn btn-sm btn-alt-danger" href="<?php echo e(route('courses.destroyAttendance', $attendance->id)); ?>">delete</a> </td> 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tumNew/Modules/Courses/Resources/views/attendance/showAttendance.blade.php ENDPATH**/ ?>