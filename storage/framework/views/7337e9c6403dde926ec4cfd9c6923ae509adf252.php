
<?php $__env->startSection('inventory_content'); ?>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật sản phẩm</h2>
          </div>
        </div>
        
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <?php $__currentLoopData = $edit_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(URL::to('/update-product-inventory/'.$pro->product_id)); ?>" class="tm-edit-product-form" method="get" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="form-group mb-3">
                <label for="name">Tên sản phẩm</label>
                <input value="<?php echo e($pro->product_name); ?>" id="name" name="product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Giá sản phẩm</label>
                <input value="<?php echo e($pro->product_price); ?>" id="name" name="product_price" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Hình ảnh sản phẩm</label>
                <input  id="name" name="product_image" type="file" class="form-control form-control-lg validate">
                <img src="<?php echo e(URL::to('public/uploads/product/'.$pro->product_image)); ?>" alt="" height="100" width="100">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả sản phẩm</label>
                <textarea name="product_desc" class="form-control validate" rows="3" required="" style="width: 100%">
<?php echo e($pro->product_desc); ?>

                </textarea>
              </div>
              <div class="form-group mb-3">
                <label for="description">Nội dung sản phẩm</label>
                <textarea name="product_content" class="form-control validate" rows="4" required="" style="width: 100%">
<?php echo e($pro->product_content); ?>

                
                </textarea>
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
                <select name="product_cate" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                <?php $__currentLoopData = $cate_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cate->category_id == $pro->category_id): ?>
                    <option selected value="<?php echo e($cate->category_id); ?>"><?php echo e($cate->category_name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($cate->category_id); ?>"><?php echo e($cate->category_name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Thương hiệu</label>
                <select name="product_brand" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                <?php $__currentLoopData = $brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cate->category_id == $pro->category_id): ?>
                   <option selected value="<?php echo e($brand->brand_id); ?>"><?php echo e($brand->brand_name); ?></option>
                   <?php else: ?>
                   <option value="<?php echo e($brand->brand_id); ?>"><?php echo e($brand->brand_name); ?></option>
                   <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </select>
              </div>

              <div class="form-group mb-3">
                <label for="name">Số lượng sản phẩm</label>
                <input value="<?php echo e($pro->product_qty); ?>" id="name" name="product_qty" type="text" class="form-control form-control-lg validate" required="">
              </div>


              <div class="col-12">
                <button name="update_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật sản phẩm</button>
              </div>
            </form>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('inventory_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/inventory/edit_product.blade.php ENDPATH**/ ?>