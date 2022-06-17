<div class="hero bg-white overflow-hidden">
    <div class="hero-inner">
        <div class="content content-full text-center">
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title"> Welcome <?php echo e($applicant->email); ?> to <?php echo e(config('app.name')); ?></h3>
                </div>
                <div class="block-content block-content-full">
                    <p>
                        Click <a href=" <?php echo e(route('application.emailverification', $applicant->VerifyEmail->verification_code)); ?>">this link </a> to verify your email.
                        To login to your username: <?php echo e($applicant->email); ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\TUM\Modules/Application\Resources/views/emails/verification-email.blade.php ENDPATH**/ ?>