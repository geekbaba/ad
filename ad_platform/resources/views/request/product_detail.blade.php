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
            <p>青年黑卡，真人管家一对一，发条消息，全天候随时响应。酒店机票底价，承诺预订贵了双倍差价赔付。<br>Iphone7首发95折、五星酒店试睡、免费贵宾厅活动、澳洲华裔小姐酒会邀请等…不定期为黑卡会员提供俱乐部专属福利活动...不是信用卡，竟有3000-10万额度！<br>
                只需下载青年黑卡APP，额度随你花！</p>
            <h3>使用流程</h3>
            <p>点击立即办理按钮，进入购卡页 <br>
                选号—定制姓名—填写收件信息—确认提交—选择支付方式—提交 <br>
                选择付款，在线支付成功或货到付款</p>
            <h3>使用规则</h3>
            <p>有关办卡或咨询等问题，可直接联系青年黑卡客服专线：0411-39047913或4000-490-700 <br>
                券码或使用流程，也可联系客服专线：400-080-6659或客服QQ：4000806659 （工作日9:30至18:30）</p>
        </div>
        <div class="footer">
            <p>订单编号：47761995250874 <br>
                客服热线：400-080-6659</p>
        </div>
    </div>
    <p class="tips">*兑换项和活动均与设备生产商Apple Inc.无关</p>
<div class="fixed">
    <a href="{{$product->object->target_url}}" class="btn">{{$product->object->button_name}}</a>
</div>
</body>
</html>