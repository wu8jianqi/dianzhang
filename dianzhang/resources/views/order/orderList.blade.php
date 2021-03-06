

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>搜索</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/common/bootstrap/css/bootstrap.css')}}" media="all">
    <link rel="stylesheet" href="static/layuiadmin/style/template.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layadmin-caller">
        <form class="layui-form caller-seach" action="">
            <i class="layui-icon layui-icon-search caller-seach-icon caller-icon"></i>
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input caller-pl32">
            <i class="layui-icon layui-icon-close caller-dump-icon caller-icon"></i>
        </form>
        <div class="layui-tab layui-tab-brief caller-tab" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="{{$order_type==1 ? 'layui-this' :''}} select_type" data-type="1">待接订单（{{$category_count['no_received']}}）</li>
                <li class="select_type  {{$order_type==2 ? 'layui-this' :''}}" data-type="2">配货中（{{$category_count['send']}}）</li>
                <li class="select_type {{$order_type==3 ? 'layui-this' :''}}" data-type="3">今日订单（{{$category_count['this_day']}}）</li>
                <li class="select_type {{$order_type==4 ? 'layui-this' :''}}" data-type="4">昨日订单（{{$category_count['today']}}）</li>
                <li class="select_type {{$order_type==5 ? 'layui-this' :''}}" data-type="5">所有订单（{{$category_count['all']}}）</li>
            </ul>
        </div>
        <div class="caller-contar">
            @foreach ($data as $data_item)
                <div class="caller-item">
                    <img src="{{$data_item['consumer']['avatar']}}" alt="" class="caller-img caller-fl">
                    <div class="caller-main caller-fl">
                        <p><i class="layui-icon layui-icon-user"></i><strong>{{$data_item['consumer']['nick_name']}}</strong> </p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-time"></i>{{date("Y-m-d h:i:s",$data_item['pay_time'])}}</p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-location"></i>{{$data_item['consumer']['address']['name']}}</p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-cellphone-fine"></i>{{$data_item['consumer']['address']['phone']}}</p>
                        @foreach($data_item['order_goods'] as $value)
                        <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>{{$value['goods_name']}}&nbsp 数量:{{$value['number'] }} &nbsp 价格: {{$value['price']}} 元</p>
                        @endforeach
                        <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>泡面 &nbsp 数量:5 &nbsp  价格:5元</p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>可怜 &nbsp数量:5 &nbsp  价格:5元</p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-form"></i>雪碧 &nbsp数量:5 &nbsp  价格:5元</p>
                        <p class="caller-adds"><i class="layui-icon layui-icon-rmb"></i>总共价格 :55元</p>
                    </div>
                    @if($data_item['shopowner_status']==2)
                    <button class="layui-btn layui-btn-sm caller-fr getorder  layui-btn-normal" data-type="{{$data_item['order_id']}}">
                        <i class="layui-icon layui-icon-ok"></i>
                        确定接单
                    </button>
                        <button class="layui-btn layui-btn-sm caller-fr refuse" style="background: #FF5722"  data-type="{{$data_item['order_id']}}">
                            <i class="layui-icon layui-icon-ok"></i>
                            拒接
                        </button>
                    @elseif($data_item['shopowner_status']==3)
                        <button class="layui-btn layui-btn-sm caller-fr  layui-btn-warm  " data-type="{{$data_item['order_id']}}">
                            <i class="layui-icon layui-icon-ok"></i>
                            配送中
                        </button>
                    @elseif($data_item['shopowner_status']==4)
                        <button class="layui-btn layui-btn-sm caller-fr  ayui-btn-normal " data-type="{{$data_item['order_id']}}">
                            <i class="layui-icon layui-icon-ok"></i>
                            订单完成
                        </button>
                       @endif
                </div>
            @endforeach
                <div style="float: right;" >{{$page}}</div>
        </div>

    </div>

    <script src="static/layuiadmin/layui/layui.js"></script>
    <script>
        layui.config({
            base: 'static/layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'laypage','layer'], function(){
            var laypage = layui.laypage,layer = layui.layer,
                $ = layui.$
            laypage.render({
                elem: 'demo1'
                ,count: 70 //数据总数

            });

            // 确定接单
            $(document).on('click','.getorder', function(){
                var id = $(this).data('type');
                layer.confirm('确定接单？', function (index) {
                    $.ajax({
                        url: "{{route('keepOwnerUpdateOrderStatus')}}",
                        data: {'order_id': id,
                            'type':2,
                            '_token': '{{csrf_token()}}'
                        },
                        type: "post",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            layer.msg(data.msg);
                            location.reload(); //删除成功后再刷新
                        },
                        error: function (data) {
                          //  layer.msg('错误');
                           $.messager.alert('错误', data.msg);
                        }
                    });
                //    layer.msg('哦')
                    layer.close(index);
                });

               // active[type] && active[type].call(this);
            });
            // 确定送达
            $(document).on('click','.delivery', function(){
                var id = $(this).data('type');
                layer.confirm('确定送货成功吗？', function (index) {
                    $.ajax({
                        url: "{{route('keepOwnerUpdateOrderStatus')}}",
                        data: {'order_id': id,
                            'type':3,
                            '_token': '{{csrf_token()}}'
                        },
                        type: "post",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            layer.msg(data.msg);
                            location.reload(); //删除成功后再刷新
                        },
                        error: function (data) {
                            //  layer.msg('错误');
                            $.messager.alert('错误', data.msg);
                        }
                    });
                    //    layer.msg('哦')
                    layer.close(index);
                });

                // active[type] && active[type].call(this);
            });
            $(document).on('click','.refuse', function(){
            // 拒绝
                var id = $(this).data('type');
                layer.confirm('确定拒绝吗，考虑一下，该订单会消失哦？', function (index) {
                    $.ajax({
                        url: "{{route('keepOwnerUpdateOrderStatus')}}",
                        data: {'order_id': id,
                            'type':4,
                            '_token': '{{csrf_token()}}'
                        },
                        type: "post",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            layer.msg(data.msg);
                            location.reload(); //删除成功后再刷新
                        },
                        error: function (data) {
                           layer.msg('错误');

                        }
                    });
                    //    layer.msg('哦')
                    layer.close(index);
                });
                // active[type] && active[type].call(this);
            });

            $(document).on('click','.select_type', function(){
            // 拒绝
                var order_type = $(this).data('type');

                    $.ajax({
                        url: "{{route('getOrder')}}",
                        data: {'order_type': order_type,
                            '_token': '{{csrf_token()}}'
                        },
                        type: "post",
                        dataType: "json",
                        success: function (data) {
                         $('.caller-contar').html(data.msg);
                            console.log(111);
                           // layer.msg(data.msg);
                           // location.reload(); //删除成功后再刷新
                        },
                        error: function (data) {
                            //  layer.msg('错误');


                        }
                    });
                    //    layer.msg('哦')


                // active[type] && active[type].call(this);
            });


        });
    </script>
    </div>
</body>
</html>