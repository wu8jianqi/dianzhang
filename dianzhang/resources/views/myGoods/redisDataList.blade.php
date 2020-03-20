
<div class="layui-fluid layadmin-cmdlist-fluid">
    <div class="layui-row layui-col-space30">
        {{--@foreach($data as $value)--}}
        <div class="layui-col-md2 layui-col-sm4 layui-col-xs12">
            <div class="cmdlist-container">
                @foreach($data as $value)
                    <div class="layui-col-xs12 layui-fluid  {{'item'.$value['goods_id']}}">
                        <div class="layui-col-xs4">
                            <img src="static/layuiadmin/style/res/template/portrait.png" class="" data-type="">
                        </div>
                        <p class="layui-col-xs7  layui-col-xs-offset1">商品名称：{{$value['goods_name']}}</p>
                        <p class="layui-col-xs7  layui-col-xs-offset1">价格：{{$value['price']/100}}元</p>
                        <p class="layui-col-xs7  layui-col-xs-offset1">火拼：{{$value['is_discount']==1 ? '否':'是'}}</p>
                        <div class="layui-col-xs3  layui-col-xs-offset1">
                            <span class="{{'car_stock'.$value['goods_id']}}"
                                  data-type="{{$value['stock']}}">库存：{{$value['stock']}}</span>
                        </div>
                        <div class="layui-col-xs3  layui-col-xs-offset1">
                            <span class="layui-col-xs3" style="text-align: center;background: #40AFFE"><i
                                        class="layui-icon layui-icon-subtraction  jia1"
                                        data-type="{{$value['goods_id']}}"></i> </span>
                            <input type="number" placeholder="数量" style="display: inline ;border: none;text-align: center" disabled class="layui-col-xs6 stock_total  {{'cart_count'.$value['goods_id']}}   " {{ 'value='.$value['count']   }}>
                            <span style="text-align: center;background: #40AFFE" class="layui-col-xs3 jian1" data-type="{{$value['goods_id']}}"><i
                                        class="layui-icon layui-icon-addition "
                                        ></i>  </span>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<script>



</script>
</body>
</html>