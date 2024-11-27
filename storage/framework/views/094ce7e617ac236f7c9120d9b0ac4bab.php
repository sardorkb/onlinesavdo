<?php $__env->startSection('title', ' Banner qo\'shish | Baraka Development'); ?>

<?php $__env->startSection('main-content'); ?>

<div class="card">
  <h5 class="card-header">Banner qo'shish</h5>
  <div class="card-body">
    <form method="post" action="<?php echo e(route('banner.store')); ?>">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Sarlavha <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="<?php echo e(old('title')); ?>"
          class="form-control">
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="form-group">
        <label for="inputDesc" class="col-form-label">Izoh</label>
        <textarea class="form-control" id="description" name="description"><?php echo e(old('description')); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Rasm <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-btn" style="color: white">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="far fa-file-image"></i> Tanlang
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="<?php echo e(old('photo')); ?>">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
          <option value="active">Aktiv</option>
          <option value="inactive">Aktiv emas</option>
        </select>
        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <div class="form-group mb-3">
        <button type="reset" class="btn btn-warning">Qaytadan kiritish</button>
        <button class="btn btn-success" type="submit">Qo'shish</button>
      </div>
    </form>
  </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('backend/summernote/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="<?php echo e(asset('backend/summernote/summernote.min.js')); ?>"></script>
  <script>
    $('#lfm').filemanager('image');

    $(document).ready(function () {
    $('#description').summernote({
      placeholder: "Qisqacha izoh yozing.....",
      tabsize: 2,
      height: 150
    });
    });
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/backend/banner/create.blade.php ENDPATH**/ ?>