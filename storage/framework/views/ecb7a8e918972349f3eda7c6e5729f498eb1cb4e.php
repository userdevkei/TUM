<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
  <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
          <div class="flex-grow-1">
              <h4 class="h3 fw-bold mb-2">
                  Edit Course
              </h4>
          </div>
      </div>
  </div>
</div>
    <div class="content">
      <div  style="margin-left:20%;" class="block block-rounded col-md-9 col-lg-8 col-xl-6">
            <div class="block-header block-header-default">
              <h3 class="block-title">Add Course</h3>
            </div>
            <div class="block-content block-content-full">
              <div class="row">
                <div class="col-lg-12 space-y-0">

                   <form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo e(route('courses.updateCourse',$data->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-12 col-xl-12">
                      <select name="campus" id="campus"class="form-control form-control-alt text-uppercase">
                        <option  selected value="<?php echo e($data->campus_id); ?>"><?php echo e($data->campus_id); ?></option>
                        <?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($campus->name); ?>"><?php echo e($campus->name); ?></option>        
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                   
                    <div class="col-12 col-xl-12">
                      <select name="school"  class="form-control form-control-alt text-uppercase">
                        <option selected value="<?php echo e($data->school_id); ?>"> <?php echo e($data->school_id); ?></option>
                        <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($school->name); ?>"><?php echo e($school->name); ?></option>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-12 col-xl-12">
                      <select name="department" value="<?php echo e($data->department_id); ?>" class="form-control form-control-alt text-uppercase">
                        <option selected value="<?php echo e($data->department_id); ?>"> <?php echo e($data->department_id); ?></option>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($department->name); ?>"><?php echo e($department->name); ?></option>        
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="col-12 col-xl-12">
                      <input type="text" class="form-control form-control-alt text-uppercase"  value="<?php echo e($data->course_name); ?>"  id="course_name" name="course_name" placeholder="Course Name">
                    </div>
                    <div class="col-12 col-xl-12">
                        <input type="text" class="form-control form-control-alt text-uppercase"  value="<?php echo e($data->course_code); ?>"  id="course_code" name="course_code" placeholder="Course Code">
                      </div>
                      <div class="col-12 col-xl-12">
                        <input type="text" class="form-control form-control-alt text-uppercase"  value="<?php echo e($data->course_duration); ?>"  id="course_duration" name="course_duration" placeholder="Course Duration">
                      </div>
                      <div class="col-12 col-xl-12">
                        <input type="text" class="form-control form-control-alt text-uppercase"  value="<?php echo e($data->course_requirements); ?>"  id="course_requirements" name="course_requirements" placeholder="Course Requirements">
                      </div>
                      <div class="col-12 text-center p-3">
                        <button type="submit" class="btn btn-alt-success" data-toggle="click-ripple">Update</button>
                      </div> 
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/tum/Modules/Courses/Resources/views/course/editCourse.blade.php ENDPATH**/ ?>