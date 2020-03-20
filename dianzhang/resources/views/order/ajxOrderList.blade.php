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