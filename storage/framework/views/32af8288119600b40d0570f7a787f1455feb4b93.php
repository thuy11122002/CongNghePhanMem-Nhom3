
<?php $__env->startSection('inventory_content'); ?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật danh mục sản phẩm</h2>
          </div>
        </div>
        <?php $__currentLoopData = $edit_category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="<?php echo e(URL::to('/update-category-product-inventory/'.$edit_value->category_id)); ?>" class="tm-edit-product-form" method="get">
              <?php echo e(csrf_field()); ?>

              <div class="form-group mb-3">
                <label for="name">Tên danh mục</label>
                <input value="<?php echo e($edit_value->category_name); ?>" id="name" name="category_product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả danh mục</label>
                <textarea name="category_product_desc" class="form-control validate" rows="5" required="" style="width: 100%">
<?php echo e($edit_value->category_desc); ?>

                </textarea>
              </div>
              <div class="col-12">
                <button name="update_category_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật danh mục</button>
              </div>
            </form>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="row">
      <div class="col-12 text-center">
        <h5 class="tm-block-title d-inline-block" style="color: red;">
          <?php
          $message = Session::get('message');
          if ($message) {
            echo $message;
            Session::put('message', null);
          }
          ?>
        </h5>
      </div>
    </div>

    </div>


    

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('inventory_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/inventory/edit_category_product.blade.php ENDPATH**/ ?>