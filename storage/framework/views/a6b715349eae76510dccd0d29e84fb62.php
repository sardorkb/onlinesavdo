<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('backend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <main class="main" id="top">

        <?php echo $__env->make('backend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('backend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">

            <?php echo $__env->yieldContent('main-content'); ?>

            <?php echo $__env->make('backend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </main>
</body>
</html>
<?php /**PATH /var/www/barakarasmiy/resources/views/backend/layouts/master.blade.php ENDPATH**/ ?>