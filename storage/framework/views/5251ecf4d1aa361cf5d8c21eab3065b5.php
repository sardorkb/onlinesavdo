<?php $__env->startSection('title', 'Ro\'yxatdan o\'tish | Baraka Development'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="container">
    <div class="col-auto">
        <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Bosh sahifa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kirish</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Ro'yxatdan o'tish</h2>
                    <p>Saytdan foydalanish uchun ro'yxatdan o'ting!</p>
                    <!-- Form -->
                    <form class="form" method="post" action="<?php echo e(route('register.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>F.I.Sh.<span>*</span></label>
                                    <input type="text" name="name" placeholder="" required="required"
                                        value="<?php echo e(old('name')); ?>">
                                    <?php $__errorArgs = ['name'];
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
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Elektron pochta<span>*</span></label>
                                    <input type="text" name="email" placeholder="" required="required"
                                        value="<?php echo e(old('email')); ?>">
                                    <?php $__errorArgs = ['email'];
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
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Parol<span>*</span></label>
                                    <input type="password" name="password" placeholder="" required="required"
                                        value="<?php echo e(old('password')); ?>">
                                    <?php $__errorArgs = ['password'];
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
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Parolni tasdiqlang<span>*</span></label>
                                    <input type="password" name="password_confirmation" placeholder=""
                                        required="required" value="<?php echo e(old('password_confirmation')); ?>">
                                    <?php $__errorArgs = ['password_confirmation'];
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
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Ro'yxatdan o'tish</button>
                                    <a href="<?php echo e(route('login.form')); ?>" class="btn">Kirish</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Login -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
        .login-container {
            margin: 50px auto;
            max-width: 600px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #003366;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #003366;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group span.text-danger {
            color: red;
            font-size: 12px;
        }

        .login-btn {
            justify-content: space-between;
            margin-right: 5px;
            align-items: center;
            margin-bottom: 15px;
        }

        .login-btn .btn {
            padding: 10px 20px;
            background-color: #00297D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .login-btn .btn:hover {
            background-color: #4980f1;
        }
        .checkbox {
            margin-bottom: 15px;
        }

        .lost-pass {
            display: block;
            text-align: center;
            color: #003366;
            text-decoration: none;
            margin-top: 10px;
        }

        .lost-pass:hover {
            text-decoration: underline;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/barakarasmiy/resources/views/frontend/pages/register.blade.php ENDPATH**/ ?>