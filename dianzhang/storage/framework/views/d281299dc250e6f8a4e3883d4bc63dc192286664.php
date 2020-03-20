
<div class="layui-fluid layadmin-cmdlist-fluid">
    <div class="layui-row layui-col-space30">
        
        <div class="layui-col-md2 layui-col-sm4 layui-col-xs12">
            <div class="cmdlist-container">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="layui-col-xs12 layui-fluid  <?php echo e('item'.$value['goods_id']); ?>">
                        <div class="layui-col-xs4">
                            <img src="static/layuiadmin/style/res/template/portrait.png" class="" data-type="">
                        </div>
                        <p class="layui-col-xs7  layui-col-xs-offset1">商品名称：<?php echo e($value['goods_name']); ?></p>
                        <p class="layui-col-xs7  layui-col-xs-offset1">价格：<?php echo e($value['price']/100); ?>元</p>
                        <p class="layui-col-xs7  layui-col-xs-offset1">火拼：<?php echo e($value['is_discount']==1 ? '否':'是'); ?></p>
                        <div class="layui-col-xs3  layui-col-xs-offset1">
                            <span class="<?php echo e('car_stock'.$value['goods_id']); ?>"
                                  data-type="<?php echo e($value['stock']); ?>">库存：<?php echo e($value['stock']); ?></span>
                        </div>
                        <div class="layui-col-xs3  layui-col-xs-offset1">
                            <span class="layui-col-xs3" style="text-align: center;background: #40AFFE"><i
                                        class="layui-icon layui-icon-subtraction  jia1"
                                        data-type="<?php echo e($value['goods_id']); ?>"></i> </span>
                            <input type="number" placeholder="数量" style="display: inline ;border: none;text-align: center" disabled class="layui-col-xs6 stock_total  <?php echo e('cart_count'.$value['goods_id']); ?>   " <?php echo e('value='.$value['count']); ?>>
                            <span style="text-align: center;background: #40AFFE" class="layui-col-xs3 jian1" data-type="<?php echo e($value['goods_id']); ?>"><i
                                        class="layui-icon layui-icon-addition "
                                        ></i>  </span>
                        </div>
                    </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
</div>
<script>



</script>
</body>
</html>