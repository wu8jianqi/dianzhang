<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/admin/common/bootstrap/css/bootstrap.css')); ?>"
          media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/template.css" media="all">
</head>
<body>


<div class="layui-fluid layadmin-cmdlist-fluid">
    <div class="layui-row layui-col-space30">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="layui-col-md2 layui-col-sm4 layui-col-xs6">
                <div class="cmdlist-container">
                    <img src="static/layuiadmin/style/res/template/portrait.png"
                         class="<?php echo e('goods_pic'.$value['goods']['goods_id']); ?>"
                         data-type="<?php echo e($value['goods']['goods_pic']); ?>">
                    <div class="cmdlist-text" style="padding: 6px">
                        <div style="display: flex;justify-content: space-between;font-size: 12px">
                            <span class="<?php echo e('goods_name'.$value['goods']['goods_id']); ?>"
                                  data-type="<?php echo e($value['goods']['goods_name']); ?>"><?php echo e($value['goods']['goods_name']); ?></span>
                            <span class="<?php echo e('is_discount'.$value['goods']['goods_id']); ?>"
                                  data-type="<?php echo e($value['goods']['is_discount']); ?>">火拼:<?php echo e($value['goods']['is_discount']==1?'是':'否'); ?></span>
                        </div>
                        <div style="display: flex;justify-content: space-between;font-size: 12px">
                            <span class="<?php echo e('present_price'.$value['goods']['goods_id']); ?>"
                                  data-type="<?php echo e($value['goods']['present_price']); ?>">￥ <?php echo e($value['goods']['present_price']/100); ?>

                                元</span>
                            <span class="<?php echo e('stock'.$value['goods']['goods_id']); ?>"
                                  data-type="<?php echo e($value['stock']); ?>">库存：<?php echo e($value['stock']); ?></span>
                        </div>
                        <div>
                            <div style="display: flex;justify-content:space-between ">
                                <button type="button" class="layui-btn layui-btn-fluid layui-btn-warm jia " style="border-radius: 12px"
                                        data-type="<?php echo e($value['goods']['goods_id']); ?>"><i
                                            class="layui-icon">&#xe67e;</i></button>
                                <input type="number" name="password" required lay-verify="required" placeholder="数量"
                                       style="display: inline;border:none;background: honeydew;text-align:center"
                                       class="layui-btn-fluid  <?php echo e('jianumber'.$value['goods']['goods_id']); ?>" <?php echo e(isset($redis_data[$value['goods']['goods_id']])? 'value='.$redis_data[$value['goods']['goods_id']]['count'] : ''); ?>>
                                <button type="button" class="layui-btn layui-btn-fluid layui-btn-warm jian" style="border-radius: 12px"
                                        data-type="<?php echo e($value['goods']['goods_id']); ?>"><i
                                            class="layui-icon">&#xe654;</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="layui-col-md12 layui-col-sm12">
            <div style="float: right"> <?php echo e($page); ?></div>
        </div>
    </div>
</div>

<div class="" style="position: fixed ;z-index: 100;bottom: 5px; width: 100%;height: 36px;display: flex;justify-content: space-between">

    <div style="align-self: center;height:36px;line-height:36px;font-size: 18px;border-top-left-radius: 25px;border-bottom-left-radius: 25px;margin-right: 4px;color: white ;display: flex;justify-content: center"
         class="layui-col-sm3 layui-col-xs3 layui-bg-cyan">数量：<span class="total_count"><?php echo e($total['total_count']); ?></span>
    </div>
    <div style="align-self: center;height:36px;line-height:36px;font-size: 18px; color: white;display: flex;justify-content: center"
         class="layui-col-sm6  layui-col-xs6 layui-bg-cyan btnxx">
        <span>  <i class="layui-icon">&#xe65e;</i>
        总价：<span class="total_price"><?php echo e($total['total_price']/100); ?></span>元</span>
    </div>
    <div style="align-self: center;margin-left: 4px;height:36px;line-height:36px;font-size: 18px;border-top-right-radius: 25px;border-bottom-right-radius: 25px;display: flex;justify-content: center"
         class="layui-col-sm3 layui-col-xs3 layui-bg-cyan "><span>提交订单</span></div>
</div>



<div></div>
<script src="static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index']);

    layui.use(['index'], function () {
        var layer = layui.layer,
            $ = layui.$,
            admin = layui.admin;
        $(document).on('click', '.jian', function () {
            var goods_id = $(this).data('type');
            var goods_name = $('.goods_name' + goods_id).data('type');
            var goods_pic = $('.goods_pic' + goods_id).data('type');
            var is_discount = $('.is_discount' + goods_id).data('type');
            var present_price = $('.present_price' + goods_id).data('type');
            var stock = $('.stock' + goods_id).data('type');
            var xx = $('.jianumber'+goods_id).val();
            xx = Number(xx)
            console.log(xx);
            if (!xx) {
                $('.jianumber'+goods_id).val(1);
            } else {
                if (xx + 1 > Number(stock)) {
                    $('.jianumber'+goods_id).val(Number(stock));
                } else {
                    $('.jianumber'+goods_id).val(xx + 1);
                }
            }
            var count = $('.jianumber'+goods_id).val();
            $.ajax({
                url: "<?php echo e(route('addCarGoods')); ?>",
                data: {
                    'goods_id': goods_id,
                    'goods_name': goods_name,
                    'goods_pic': goods_pic,
                    'is_discount': is_discount,
                    'count': count,
                    'stock': Number(stock),
                    'present_price': present_price,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                type: "post",
                dataType: "json",
                success: function (data) {
                    $('.total_count').html(data.data.total_count);
                    $('.total_price').html(data.data.total_price/100);

                },
                error: function (data) {
                  layer.msg('错误');

                }
            });
        });
        $(document).on('click', '.jia', function () {
            var goods_id = $(this).data('type');
            var goods_name = $('.goods_name' + goods_id).data('type');
            var goods_pic = $('.goods_pic' + goods_id).data('type');
            var is_discount = $('.is_discount' + goods_id).data('type');
            var present_price = $('.present_price' + goods_id).data('type');
            var stock = $('.stock' + goods_id).data('type');
            var xx = $('.jianumber'+goods_id).val();
            xx = Number(xx)
            console.log(typeof(xx));
            if (!xx) {
                $('.jianumber'+goods_id).val(0);
            } else {
                if (xx > Number(stock)) {
                    $('.jianumber'+goods_id).val(Number(stock));
                } else if (xx - 1 < 0) {
                    $('.jianumber'+goods_id).val(0);
                }
                else {
                    $('.jianumber'+goods_id).val(xx - 1);
                }
            }
            var count = $('.jianumber'+goods_id).val();
            $.ajax({
                url: "<?php echo e(route('addCarGoods')); ?>",
                data: {
                    'goods_id': goods_id,
                    'goods_name': goods_name,
                    'goods_pic': goods_pic,
                    'is_discount': is_discount,
                    'count': count,
                    'stock': Number(stock),
                    'present_price': present_price,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                type: "post",
                dataType: "json",
                success: function (data) {
                    $('.total_count').html(data.data.total_count);
                    $('.total_price').html(data.data.total_price/100);
                },
                error: function (data) {
                  layer.msg('错误');
                }
            });
        });
        $(document).on('click', '.btnxx', function () {
            $(".apply_cart").fadeToggle();
            $.ajax({
                url: "<?php echo e(route('redisDataList')); ?>",
                type: "get",
                dataType: "json",
                success: function (data) {
                    layer.open({
                        title:'订货购物车'
                        ,type: 1
                       ,skin: 'layui-layer-rim'
                        ,shadeClose: true
                        ,area: admin.screen() < 2 ? ['100%', '500px'] : ['700px', '500px']
                        ,content: data.msg
                        ,end: function(index, layero){
                            location.reload()
                            layer.close(index)
                        }
                    });
                },
                error: function (data) {
                    layer.msg('错误');
                }
            });


        });
        $(document).on('click', '.jian1', function () {
            var goods_id = $(this).data('type');
            var count = $('.cart_count'+goods_id).val();
            var stock = $('.car_stock'+goods_id).data('type');
            count = Number(count);
            console.log(goods_id);
            if (!count) {
                $('.cart_count'+goods_id).val(1);
            } else {
                if (count + 1 > Number(stock)) {
                    $('.cart_count'+goods_id).val(Number(stock));
                } else {
                    $('.cart_count'+goods_id).val(count + 1);
                }
            }
            $.ajax({
                url: "<?php echo e(route('addCarGoods')); ?>",
                data: {
                    'goods_id': goods_id,
                    'count': $('.cart_count'+goods_id).val(),
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                type: "post",
                dataType: "json",
                success: function (data) {
                    $('.total_count').html(data.data.total_count);
                    $('.total_price').html(data.data.total_price/100);
                },
                error: function (data) {
                    layer.msg('错误');

                }
            });
        });
        $(document).on('click', '.jia1', function () {
            var goods_id = $(this).data('type');
            var count = $('.cart_count'+goods_id).val();
            var stock = $('.car_stock'+goods_id).data('type');
            count = Number(count);
            console.log(count);
            if (!count) {
                $('.item'+goods_id).html('');
            } else {
                if (count  > Number(stock)) {
                    $('.cart_count'+goods_id).val(Number(stock));
                }else if(count-1<0){
                    $('.item'+goods_id).html('');
                   // $('.cart_count'+goods_id).val(0);
                }

                else {
                    $('.cart_count'+goods_id).val(count -1);
                }
            }

            $.ajax({
                url: "<?php echo e(route('addCarGoods')); ?>",
                data: {
                    'goods_id': goods_id,
                    'count': $('.cart_count'+goods_id).val(),
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                type: "post",
                dataType: "json",
                success: function (data) {
                    $('.total_count').html(data.data.total_count);
                    $('.total_price').html(data.data.total_price/100);
                },
                error: function (data) {
                    layer.msg('错误');

                }
            });
        });

    });

</script>
</body>
</html>