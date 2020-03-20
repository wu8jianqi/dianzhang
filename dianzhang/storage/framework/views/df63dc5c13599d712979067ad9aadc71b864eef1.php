<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/admin/common/bootstrap/css/bootstrap.css')); ?>" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/template.css" media="all">
</head>
<body>


<div class="layui-fluid layadmin-cmdlist-fluid">
    <div class="layui-row layui-col-space30">

        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                    <div class="cmdlist-text">
                        <p >    <?php echo e($value['goods']['goods_name']); ?></p>
                        <p >      火拼:
                            <?php echo e($value['goods']['is_discount']==1?'是':'否'); ?></p>

                        <div class="price">
                            <b>￥  <?php echo e($value['goods']['present_price']/100); ?> </b>
                            <b>库存：<?php echo e($value['stock']); ?> </b>
                            <span class="flow">

                    </span>
                        </div>
                    </div>

            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                        <div class="price">
                            <b>￥79</b>
                            <p>
                                ¥
                                <del>130</del>
                            </p>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="layui-col-md12 layui-col-sm12">
            <div style="float: right"> <?php echo e($page); ?></div>
        </div>
    </div>
</div>


<script src="static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index']);
    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage
            ,layer = layui.layer;

        //总页数低于页码总数
        laypage.render({
            elem: 'demo0'
            ,count: 50 //数据总数
        });
    });
</script>
</body>
</html>