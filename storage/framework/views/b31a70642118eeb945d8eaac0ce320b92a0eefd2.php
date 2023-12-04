
<?php $__env->startSection('admin_content'); ?>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Thêm sản phẩm</h2>
          </div>
        </div>
        
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="<?php echo e(URL::to('/save-product')); ?>" class="tm-edit-product-form" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group mb-3">
                <label for="name">Tên sản phẩm</label>
                <input id="name" name="product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Giá sản phẩm</label>
                <input id="name" name="product_price" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Hình ảnh sản phẩm</label>
                <input id="name" name="product_image" type="file" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="description">Mô tả sản phẩm</label>
                <textarea name="product_desc" class="form-control validate" rows="3" required="" style="width: 100%"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="description">Nội dung sản phẩm</label>
                <textarea name="product_content" class="form-control validate" rows="4" required="" style="width: 100%"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Hiển thị</label>
                <select name="product_status" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  <option value="0">Ẩn</option>
                  <option value="1">Hiển thị</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Danh mục sản phẩm</label>
                <select name="category_id" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  <option value="0">Dien thoai</option>
                  <option value="1">Phu kien</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Thương hiệu</label>
                <select name=" brand_id" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  <option value="0">Samsung</option>
                  <option value="1">Hiển thịOppo</option>
                </select>
              </div>
              <div class="col-12">
                <button name="add_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Thêm sản phẩm</button>
              </div>
            </form>
          </div>
        </div>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views//admin/add_product.blade.php ENDPATH**/ ?>