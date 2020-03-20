{{--<!DOCTYPE html>--}}
{{--<html lang="zh">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--<title>我的店员</title>--}}
{{--<link rel="stylesheet" type="text/css" href="static/pbl/css/htmleaf-demo.css"><!--演示页面样式，使用时可以不引用-->--}}
{{--<link rel="stylesheet" href="static/pbl/css/main.css">--}}

{{--<link rel="stylesheet" href="static/pbl/dist/sortable.min.css">--}}
{{--<script type="text/javascript" src="static/pbl/dist/sortable.min.js"></script>--}}
{{--</head>--}}
{{--<body style="background: #c6e8da">--}}
{{--<div class="htmleaf-container">--}}
{{--<main class="sortable">--}}
{{--<div class="container">--}}
{{--<div class="wrapper">--}}
{{--<ul class="sortable__nav nav">--}}
{{--<li>--}}
{{--<a data-sjslink="all" class="nav__link">--}}
{{--All--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a data-sjslink="flatty" class="nav__link">--}}
{{--Flatty--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a data-sjslink="funny" class="nav__link">--}}
{{--Funny--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<div id="sortable" class="sjs-default">--}}
{{--@foreach ($data as $data1)--}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="{{$data1['avatar']}}" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title"> {{$data1['nickname']}}</h2>--}}
{{--<p class="card__text">--}}
{{--等级：黄金--}}
{{--</p>--}}
{{--<p class="card__text">--}}
{{--贡献值：10000--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}

{{----}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-2.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 2</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum vitae necessitatibus, dolorem similique vero explicabo...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="funny">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-3.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 3</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, placeat voluptate, fuga tenetur eos ducimus animi porro...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-4.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 4</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit doloremque quisquam, obcaecati unde nam est quos...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-5.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 5</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse corporis hic minima nisi reprehenderit...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="funny">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-6.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 6</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel voluptatibus, id, deserunt inventore...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-7.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 7</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum enim beatae vero culpa, fuga, magni sunt dolores nam...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="flatty">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-8.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 8</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae numquam, blanditiis necessitatibus...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-sjsel="funny">--}}
{{--<div class="card">--}}
{{--<img class="card__picture" src="static/pbl/images/item-9.jpg" alt="">--}}
{{--<div class="card-infos">--}}
{{--<h2 class="card__title">Example 9</h2>--}}
{{--<p class="card__text">--}}
{{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur adipisci voluptatum laborum officiis...--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</main>--}}


{{--</div>--}}

{{--<script type="text/javascript">--}}
{{--document.querySelector('#sortable').sortablejs()--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的店员</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/common/bootstrap/css/bootstrap.css')}}" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/template.css" media="all">
</head>
<body>


<div class="layui-fluid layadmin-cmdlist-fluid">
    <div class="layui-row layui-col-space30">
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
                <a href="javascript:;">
                    <img src="static/layuiadmin/style/res/template/portrait.png">
                </a>
                <a href="javascript:;">
                    <div class="cmdlist-text">
                        <p class="info"> <i class="layui-icon layui-icon-user"></i>小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info"><i class="layui-icon layui-icon-user"></i>小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info"><i class="layui-icon layui-icon-user"></i>小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info"><i class="layui-icon layui-icon-user"></i>小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info">小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info">小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info">小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info">小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
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
                        <p class="info">小星星店员1号</p>
                        <div class="price">
                            <b>等级:黄金</b>
                            <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>贡献值
                      433
                    </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <div class="layui-col-md12 layui-col-sm12">
            {{--<div style="float: right"> {{$page}}</div>--}}
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
    layui.use(['laypage', 'layer'], function () {
        var laypage = layui.laypage
            , layer = layui.layer;

        //总页数低于页码总数
        laypage.render({
            elem: 'demo0'
            , count: 50 //数据总数
        });
    });
</script>
</body>
</html>