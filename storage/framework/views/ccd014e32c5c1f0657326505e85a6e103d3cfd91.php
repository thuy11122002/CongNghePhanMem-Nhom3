
<?php $__env->startSection('content'); ?>

<style>
  .bartop_checkout {
    display: none;
  }

  label {
    font-size: 1.6rem;
  }

  .invalid-feedback {
    font-size: 1.5rem;

  }

  .content {
    padding: 20px 0 70px 0;
  }

  textarea {
    font-size: 1.6rem;
  }
</style>

<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-6 order-md-1">
      <h2 class="mb-3">Thông tin thanh toán</h2>

      <form class="needs-validation was-validated" action="<?php echo e(URL::to('/save-checkout-customer')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-md-12">
            <label for="firstName">Họ và tên</label>
            <input name="shipping_name" type="text" class="form-control form-control-lg validate" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Yêu cầu tên hợp lệ.
            </div>
          </div>

        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input name="shipping_email" type="email" class="form-control form-control-lg validate" id="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Vui lòng nhập địa chỉ email hợp lệ để cập nhật thông tin vận chuyển.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Địa chỉ</label>
          <input name="shipping_address" type="text" class="form-control form-control-lg validate" id="address" placeholder="99 An Dương Vương .." required>
          <div class="invalid-feedback">
            Vui lòng nhập địa chỉ vận chuyển của bạn.
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Điện thoại</label>
          <div class="input-group">

            <input name="shipping_phone" type="text" class="form-control form-control-lg validate" id="username" placeholder="Số điện thoại" required>
            <div class="invalid-feedback" style="width: 100%;">
              Vui lòng nhập số điện thoại của bạn
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="username">Ghi chú giao hàng</label>
          <div class="input-group">
            <textarea name="shipping_note" id="" cols="70" rows="5"></textarea>
          </div>
        </div>
        <hr class="mb-4">
        <button name="send_order" class="btn btn-primary btn-lg btn-block" style="margin-left: 0" type="submit">Ghi nhận thanh toán</button>
      </form>
    </div>
  </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/pages/checkout/show_checkout.blade.php ENDPATH**/ ?>