
  <style>
    .col-left{
        flex-basis: 35%;
    }
    .col-right{
        flex-basis: 60%;
    }
    .row-left{
       margin-top: 35px;
    }
  </style>
<?php $__env->startSection('content'); ?>
<div class="container border m-4">
    <div class="row">
    <h2> Show Product</h2>
        <div class="col-left ">
            <div class="row-left">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <?php echo e($product->productName); ?>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        <?php echo e($product->productDescription); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-right ">
            <div class="row-right">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <img src="<?php echo e(asset('images/'.$product->productImage)); ?>" style="height: 500px;width:500px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-crud\resources\views/products/show.blade.php ENDPATH**/ ?>