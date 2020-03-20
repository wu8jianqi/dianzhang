<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="caller-item">
        <img src="<?php echo e($data_item['consumer']['avatar']); ?>" alt="" class="caller-img caller-fl">
        <div class="caller-main caller-fl">
            <p><i class="layui-icon layui-icon-user"></i><strong><?php echo e($data_item['consumer']['nick_name']); ?></strong> </p>
            <p class="caller-adds"><i class="layui-icon layui-icon-time"></i><?php echo e(date("Y-m-d h:i:s",$data_item['pay_time'])); ?></p>
            <p class="caller-adds"><i class="layui-icon layui-icon-location"></i><?php echo e($data_item['consumer']['address']['name']); ?></p>
            <p class="caller-adds"><i class="layui-icon layui-icon-cellphone-fine"></i><?php echo e($data_item['consumer']['address']['phone']); ?></p>
            <?php $__currentLoopData = $data_item['order_goods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="caller-adds"><i class="layui-icon layui-icon-form"></i><?php echo e($value['goods_name']); ?>&nbsp 数量:<?php echo e($value['number']); ?> &nbsp 价格: <?php echo e($value['price']); ?> 元</p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>泡面 &nbsp 数量:5 &nbsp  价格:5元</p>
            <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>可怜 &nbsp数量:5 &nbsp  价格:5元</p>
            <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>雪碧 &nbsp数量:5 &nbsp  价格:5元</p>
            <p class="caller-adds"><i class="layui-icon layui-icon-rmb"></i>总共价格 :55元</p>
        </div>
        <?php if($data_item['shopowner_status']==2): ?>
            <button class="layui-btn layui-btn-sm caller-fr getorder  layui-btn-normal" data-type="<?php echo e($data_item['order_id']); ?>">
                <i class="layui-icon layui-icon-ok"></i>
                确定接单
            </button>
            <button class="layui-btn layui-btn-sm caller-fr refuse" style="background: #FF5722"  data-type="<?php echo e($data_item['order_id']); ?>">
                <i class="layui-icon layui-icon-ok"></i>
                拒接
            </button>
        <?php elseif($data_item['shopowner_status']==3): ?>
            <button class="layui-btn layui-btn-sm caller-fr  layui-btn-warm  " data-type="<?php echo e($data_item['order_id']); ?>">
                <i class="layui-icon layui-icon-ok"></i>
                配送中
            </button>
        <?php elseif($data_item['shopowner_status']==4): ?>
            <button class="layui-btn layui-btn-sm caller-fr  ayui-btn-normal " data-type="<?php echo e($data_item['order_id']); ?>">
                <i class="layui-icon layui-icon-ok"></i>
                订单完成
            </button>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div style="float: right;" ><?php echo e($page); ?></div>