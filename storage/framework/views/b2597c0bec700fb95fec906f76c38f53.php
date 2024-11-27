<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-body">Baraka Development<span class="d-none d-sm-inline-block"></span><span
                    class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" /><?php echo e(date('Y')); ?> &copy;</p>
        </div>
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-body-tertiary text-opacity-85">v0.0.1</p>
        </div>
    </div>
</footer>

<!-- End of Page Wrapper -->

<script>
  var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
  var navbarTop = document.querySelector('.navbar-top');
  if (navbarTopStyle === 'darker') {
    navbarTop.setAttribute('data-navbar-appearance', 'darker');
  }

  var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
  var navbarVertical = document.querySelector('.navbar-vertical');
  if (navbarVertical && navbarVerticalStyle === 'darker') {
    navbarVertical.setAttribute('data-navbar-appearance', 'darker');
  }
</script>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?php echo e(asset('back/vendors/popper/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/anchorjs/anchor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/is/is.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/fontawesome/all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/lodash/lodash.min.js')); ?>"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?php echo e(asset('back/vendors/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/feather-icons/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/dayjs/dayjs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/phoenix.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/leaflet/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/leaflet.markercluster/leaflet.markercluster.js')); ?>"></script>
    <script src="<?php echo e(asset('back/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js')); ?>"></script>
    <script src="<?php echo e(asset('back/js/ecommerce-dashboard.js')); ?>"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('backend/js/sb-admin-2.min.js')); ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo e(asset('backend/vendor/chart.js/Chart.min.js')); ?>"></script>

<!-- Page level custom scripts -->



<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 4000);
</script>
<?php /**PATH /var/www/barakarasmiy/resources/views/backend/layouts/footer.blade.php ENDPATH**/ ?>