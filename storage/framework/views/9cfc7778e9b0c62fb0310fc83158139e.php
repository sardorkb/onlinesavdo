<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="<?php echo e(route('admin')); ?>">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="<?php echo e(asset('back/img/logos/navbarlogolight.png')); ?>"
                            width="200" />
                    </div>
                </div>
            </a>
            
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <a href="<?php echo e(route('storage.link')); ?>"  class="btn btn-outline-warning btn-sm mr-3">
              Storage Link
          </a>
          <a href="<?php echo e(route('cache.clear')); ?>"  class="btn btn-outline-danger btn-sm mr-3">
            Keshni tozalash
          </a>
          </li>
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item dropdown">
              <?php echo $__env->make('backend.notification.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </li>
            <li class="nav-item dropdown">
              <?php echo $__env->make('backend.message.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                    role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <?php if(Auth()->user()->photo): ?>
                            <img class="rounded-circle " src="<?php echo e(Auth()->user()->photo); ?>" alt="" />
                        <?php else: ?>
                            <img class="img-profile rounded-circle" src="<?php echo e(asset('backend/img/avatar.png')); ?>">
                        <?php endif; ?>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <?php if(Auth()->user()->photo): ?>
                                        <img class="rounded-circle " src="<?php echo e(Auth()->user()->photo); ?>"
                                            alt="" />
                                    <?php else: ?>
                                        <img class="img-profile rounded-circle"
                                            src="<?php echo e(asset('/backend/img/avatar.png')); ?>">
                                    <?php endif; ?>
                                </div>
                                <h6 class="mt-2 text-body-emphasis"><?php echo e(Auth()->user()->name); ?></h6>
                            </div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 12rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="<?php echo e(route('admin-profile')); ?>"> <span
                                            class="me-2 text-body" data-feather="user"></span><span>Profil</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link px-3" href="<?php echo e(route('change.password.form')); ?>"><span
                                            class="me-2 text-body" data-feather="pie-chart"></span>Parolni o'zgartirish</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="<?php echo e(route('settings')); ?>"> <span
                                            class="me-2 text-body" data-feather="settings"></span>Sozlamalar</a></li>
                            </ul>
                            <hr />
                            <div class="px-3"> 
                              <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                <span class="me-2" data-feather="log-out"> </span>Chiqish
                              </a>
                              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /var/www/barakarasmiy/resources/views/backend/layouts/header.blade.php ENDPATH**/ ?>