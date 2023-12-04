
<?php $__env->startSection('content'); ?>

<style>
    .sub-banner {
        display: none;
    }

    .bartop {
        display: none;
    }
    .vieworder_customer{
        height: auto;
        margin-bottom: 100px;
        font-size: 1.6rem;
        
        
    }
    .content{
        background-color: white;

    }
</style>

<div class="container-xl vieworder_customer" >
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="margin-top:25px ; margin-bottom: 20px">Chi tiết đơn mua</h2>
                    </div>

                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        $i = 0;
                        ?>
                        <?php $__currentLoopData = $manage_details_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php
                                $i++;
                                ?>
                                <?php echo e($i); ?>

                            </td>
                            <td><?php echo e($details->product_name); ?></td>
                            <td>
                                <img src="<?php echo e(asset('public/uploads/product/'.$details->product_image)); ?>" height="100" width="100" alt="">
                            </td>

                            <td>
                                <input type="" disabled value="<?php echo e($details->product_sales_quantity); ?>" name="product_sales_quantity">
                            </td>
                            <td><?php echo e(number_format($details->product_price).' '.'VNĐ'); ?></td>
                            <td><?php echo e(number_format($details->product_sales_quantity * $details->product_price).' '.'VNĐ'); ?></td>
                        </tr>
                        <?php
                        $total_price += $details->product_sales_quantity * $details->product_price;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tfoot>
                        <tr>
                            <td colspan="5"><strong>Tổng đơn hàng:</strong></td>
                            <td><strong><?php echo e(number_format($total_price).' '.'VNĐ'); ?></strong></td>
                        </tr>
                    </tfoot>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-xl vieworder_customer_mobile" style="width: 375px; margin-left: -5px; padding-bottom: 150px">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="margin-left: -10px; margin-top:5px ; margin-bottom: 20px; font-size: 14px">Chi tiết đơn mua</h2>
                    </div>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <!-- <th>Tên sản phẩm</th> -->
                            <th style="width: 130px">Sản phẩm</th>
                            <!-- <th>Số lượng</th> -->
                            <th>Số lượng - Giá</th>
                            <!-- <th>Tổng tiền</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        $i = 0;
                        ?>
                        <?php $__currentLoopData = $manage_details_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php
                                $i++;
                                ?>
                                <?php echo e($i); ?>

                            </td>
                            <!-- <td><?php echo e($details->product_name); ?></td> -->
                            <td>
                                
                                <img src="<?php echo e(asset('public/uploads/product/'.$details->product_image)); ?>" height="60" width="60" alt="">
                                <br>
                                <?php echo e($details->product_name); ?>

                                
                            </td>

                            <!-- <td>
                                <input type="" disabled value="<?php echo e($details->product_sales_quantity); ?>" name="product_sales_quantity">
                            </td> -->
                            <td>
                                <input type="" disabled value="<?php echo e($details->product_sales_quantity); ?>" name="product_sales_quantity" style="width: 70px;">
                                <br>
                                <?php echo e(number_format($details->product_price).' '.'VNĐ'); ?>

                            </td>
                            <!-- <td><?php echo e(number_format($details->product_sales_quantity * $details->product_price).' '.'VNĐ'); ?></td> -->
                        </tr>
                        <?php
                        $total_price += $details->product_sales_quantity * $details->product_price;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Tổng đơn hàng:</strong></td>
                            <td><strong><?php echo e(number_format($total_price).' '.'VNĐ'); ?></strong></td>
                        </tr>
                    </tfoot>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/pages/order/viewdetails_order_customer.blade.php ENDPATH**/ ?>