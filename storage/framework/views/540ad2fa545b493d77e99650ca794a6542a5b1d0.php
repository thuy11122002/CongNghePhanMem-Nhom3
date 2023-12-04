<!-- start_event_group -->

<?php $__env->startSection('content'); ?>

<!-- start_event_group -->


<!-- smartphone hot -->
<div class="container search">
    <div class="row" id="filter">
        <form style="width: 100%;" action="<?php echo e(URL::to('/tim-kiem-nang-cao')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group col-xs-6" style="
    max-width: 250px;
    margin-right: 30px;
">
                <select data-filter="make" class="filter-make filter form-control" name="category_submit">

                    <option value="">Chọn danh mục: </option>
                    <option value="12">Điện thoại</option>
                    <option value="13">Âm thanh</option>
                    <option value="14">Phụ kiện</option>
                    <option value="15">Khuyến mãi</option>
                </select>
            </div>

            <div class="form-group col-xs-6" style="
    max-width: 250px;
    margin-right: 30px;
">
                <select data-filter="model" class="filter-model filter form-control" name="brand_submit">
                    <option value="">Chọn thương hiệu: </option>
                    <option value="3">iPhone</option>
                    <option value="1">SAMSUNG</option>
                    <option value="4">OPPO</option>
                    <option value="5">VIVO</option>
                    <option value="6">realme</option>

                </select>
            </div>

            <div class="form-group col-xs-6" style="
    max-width: 250px;
    margin-right: 30px;
">
                <select data-filter="price" class="filter-price filter form-control" name="price_submit">
                    <option value="">Sắp xếp theo giá:</option>
                    <option value="1">Từ thấp đến cao</option>
                    <option value="2">Từ cao đến thấp</option>
                </select>
            </div>

            <div class="form-group col-xs-6">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </form>
    </div>
</div>

<!-- search mobile -->
<div class="container search_mobile">
    <div class="row" id="filter">
        <form style="width: 100%;" action="<?php echo e(URL::to('/tim-kiem-nang-cao')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group col-xs-3 cate-group" style="width: 83px">
                <select data-filter="make" class="filter-make filter form-control" name="category_submit">

                    <option value="">Danh mục: </option>
                    <option value="12">Điện thoại</option>
                    <option value="13">Âm thanh</option>
                    <option value="14">Phụ kiện</option>
                    <option value="15">Khuyến mãi</option>
                </select>
            </div>

            <div class="form-group col-xs-3 cate-group" style="width: 115px">
                <select data-filter="model" class="filter-model filter form-control" name="brand_submit">
                    <option value="">Thương hiệu: </option>
                    <option value="3">iPhone</option>
                    <option value="1">SAMSUNG</option>
                    <option value="4">OPPO</option>
                    <option value="5">VIVO</option>
                    <option value="6">realme</option>

                </select>
            </div>

            <div class="form-group col-xs-3 cate-group" style="width: 67px">
                <select data-filter="price" class="filter-price filter form-control" name="price_submit">
                    <option value="">Xếp giá:</option>
                    <option value="1">Thấp-Cao</option>
                    <option value="2">Cao-Thấp</option>
                </select>
            </div>

            <div class="form-group col-xs-6 btn_search_mobile" style="margin-left: 47px;">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </form>
    </div>
</div>
<!--  -->
<div class="content_group">
    <div class="content_group-title">
        <h1>Kết quả tìm kiếm: <?php echo e($keywords); ?></h1>
    </div>
    <h3>Tìm thấy: <?php echo e(count($search_product)); ?> kết quả</h3>

    <div class="row row_main_content content_group-body">
        <?php $__currentLoopData = $search_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col col_main_content l-2-4 c-4">
            <a href="<?php echo e(URL::to('/chi-tiet-san-pham/'.$product->product_id)); ?>" class="group_item">
                <span class="installment">Trả góp 0%</span>
                <img class="group_item-img" src="<?php echo e(URL::to('public/uploads/product/'.$product->product_image)); ?>" alt="Photos">
                <div class="group_item-body">
                    <span class="group_item_event-sale">11.11 siêu sale</span>
                    <h3 class="group_item-body_name">
                        <?php echo e(($product->product_name)); ?>

                    </h3>
                    <ul class="group_item-body_tag">
                        <li><span>Ram 8 GB</span></li>
                        <li><span>SSD 256 GB</span></li>
                    </ul>
                    <p class="item_txt_online">Online giá rẻ</p>


                    <span class="group_item_price"><strong><?php echo e(number_format($product->product_price).' '.'VNĐ'); ?></strong></span>
                    <ul class="group_item_review">
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star-half-alt"></i>
                        </li>
                        <li class="group_item_number_overrate">
                            <p>40</p>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="show_on_mobile show_all_item">
        <a class="" href="#">
            <span>Xem tất cả <b>179</b> điện thoại</span>
        </a>
    </div>
</div>
<!-- smartphone hot -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/pages/sanpham/search.blade.php ENDPATH**/ ?>