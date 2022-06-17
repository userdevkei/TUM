


<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                        COURSES DETAILS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Intakes</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            View selected intake
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
              
                    
                  <tr>
                    <th>Course Code</th>
                    <th>Courses</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Period</th>
                    <th>Requirements</th>
                    <th>Subject1</th>
                    <th>Subject2</th>
                    <th>Subject3</th>
                    <th>Subject4</th>
                  </tr>
                  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                         <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td><?php echo e($item->course_code); ?></td>
                            <td><?php echo e($item->course_name); ?></td>
                            <td><?php echo e($item->department_id); ?></td>
                            <td><?php echo e($item->level); ?></td>
                            <td><?php echo e($item->course_duration); ?></td>
                            <td><?php echo e($item->course_requirements); ?></td>
                            <td><?php echo e($item->subject1); ?></td>
                            <td><?php echo e($item->subject2); ?></td>
                            <td><?php echo e($item->subject3); ?></td>
                            <td><?php echo e($item->subject4); ?></td>
                    
                         </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
              </table>
                </div>
            </div>
          </div>
          <!-- Dynamic Table Responsive -->
        </div>
        <!-- END Page Content -->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TUM\Modules/Courses\Resources/views/intake/viewCourse.blade.php ENDPATH**/ ?>