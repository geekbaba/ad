<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>我的奖品</title>
    <script src="{{asset('activity/0002/js/fontSize_p.js')}}"></script>
    <link rel="stylesheet" href="{{asset('activity/0002/css/myPrize.css')}}">
</head>
<body>
<div class="wrap">
    <div class="head">
        <div class="qq">4000806659</div>
        <div class="tel">400-080-6659</div>
    </div>
    <div class="prize_list">
        @foreach ($lists as $item)
        <a class="item" href="/product_details/{{$item->activity_product_id}}/">
            <div class="left"><img src="/{{$item->object->product_list_image}}" alt=""></div>
            <div class="center">
                <h3>{{$item->activity_product_name}}</h3>
                <p>有效期: <span class="time">{{$item->object->validity_date}}</span></p>
            </div>
            <div class="right"><img src="{{asset('activity/0002/images/gt-cart.jpg')}}" alt=""></div>
        </a>
        @endforeach
    </div>
    <p class="footer">已经没有更多了！</p>
</div>
</body>
</html>