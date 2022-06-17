<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
  <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
          <div class="flex-grow-1">
              <h4 class="h3 fw-bold mb-2">
                  Edit Intake
              </h4>
          </div>
      </div>
  </div>
</div>
    <div class="content">
      <div  style="margin-left:20%;" class="block block-rounded col-md-9 col-lg-8 col-xl-6">
            <div class="block-header block-header-default">
              <h3 class="block-title">Edit Intake</h3>
            </div>
            <div class="block-content block-content-full">
              <div class="row">
                <div class="col-lg-12 space-y-0">

                   
                  <form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo e(route('courses.updateIntake',$data->id)); ?>"method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                      <div class="col-12">                
                      </div>
                        <div  class="col-12">
                          <label for="intake_name">From:</label>
                          <input type="date" class="form-control form-control-alt" id="intake_name_from" name="intake_name_from" placeholder="Intake From">
                          
                        </div>
                        <br>
                        <div class="col-12">
                          <label for="intake_name">To:</label>
                          <input type="date" class="form-control form-control-alt" id="intake_name_to" name="intake_name_to" placeholder="Intake To">
                          
                        </div>
                    </div>
                    
                  <div>
                   
                    <table class="table table-responsive table-striped py-0 table-borderless">
                      
                      

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                           <td>
                            <input type="checkbox" value="<?php echo e($course->id); ?>" name="course[]">
                           </td>
                           <td>
                            <label for="course" class="form-label"> <?php echo e($course->course_name); ?> </label>
                           </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      
                        </table>
                  </div><br>
                    <div class="col-12 text-center p-3">
                      <button type="submit" class="btn btn-alt-success" data-toggle="click-ripple">update Intake</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tumNew/Modules/Courses/Resources/views/intake/editIntake.blade.php ENDPATH**/ ?>