<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>奖品</title>
    <script src="{{asset('activity/0002/js/fontSize_p.js')}}"></script>
    <link rel="stylesheet" href="{{asset('activity/0002/css/prizeDetail.css')}}">
</head>
<body>
    <div class="wrap">
        <img class="head_img" src="/{{$product->object->product_list_image}}" alt="">
        <div class="re_tit">
            <h3>{{$product->activity_product_name}}</h3>
            <p>{{$limit_day}} ( 至：{{$product->object->validity_date}} )</p>
        </div>
        <div class="content">
            <h3>图文详情：</h3>
            <p>@if(isset($product->object->description)) {!!$product->object->description!!} @endif</p>
            <h3>使用流程</h3>
            <p>@if(isset($product->object->user_manual)) {!!$product->object->user_manual!!} @endif</p>
            <h3>使用规则</h3>
            <p>@if(isset($product->object->rules)) {!!$product->object->rules!!} @endif</p>
        </div>
        <div class="footer">
            <p>客服热线：400-000-0000</p>
        </div>
    </div>
    <p class="tips">*兑换项和活动均与设备生产商Apple Inc.无关</p>
<div class="fixed">
    <a href="{{$product->object->target_url}}" class="btn">{{$product->object->button_name}}</a>
</div>
</body>
</html>