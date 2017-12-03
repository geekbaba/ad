<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{$title}}</title>

    <link href="{{asset('activity/0001/css/index.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('activity/0001/js/jquery-1.10.2.js')}}"></script>
    <script type="text/javascript" src="{{asset('activity/0001/js/awardRotate.js')}}"></script>
    <script type="text/javascript" src="{{asset('activity/0001/js/fontSize.js')}}"></script>
    <script type="text/javascript" src="/activityjs/1/js"></script>
</head>
<body style="background:#bb2e30;overflow-x:hidden;">
<!--奖项图片-->
<img src="{{asset('activity/0001/images/hb80.png')}}" id="img-80" style="display:none;"/>
<img src="{{asset('activity/0001/images/hb88.png')}}" id="img-88" style="display:none;"/>
<img src="{{asset('activity/0001/images/hblh.png')}}" id="img-lh" style="display:none;"/>
<img src="{{asset('activity/0001/images/hb600.png')}}" id="img-600" style="display:none;"/>
<img src="{{asset('activity/0001/images/hb888.png')}}" id="img-888" style="display:none;"/>
<img src="{{asset('activity/0001/images/hbsmile.png')}}" id="img-smile" style="display:none;"/>
<div class="wrap">
    <a class="rule_btn" href="javascript:void(0);"></a>
    <a class="myprize_btn" href="./myPrize.html"></a>
    <div class="banner">
        <div class="header">

        </div>
        <div class="turnplate" style="background-image:url({{asset('activity/0001/images/turnplate-bg.png')}});background-size:100% 100%;">
            <canvas class="item" id="wheelcanvas" width="422px" height="422px"></canvas>
            <img class="pointer" src="{{asset('activity/0001/images/turnplate-pointer.png')}}"/>
        </div>
    </div>
</div>
<!--规则弹出层-->
<div class="model model_rule">
    <div class="wrap">
        <div class="rule-modal-dialog">
            <header><i></i><span>活动说明</span><i></i></header>
            <section class="scroll-box">
                <div>
                    <div class="description rule-3">
                        <div class="description-scroller"><p>粉丝福利到！参与活动就有机会领取最高888元支付宝现金红包，这是一个拯救月光族的机会！等你砸出来！</p>
                            <p>活动说明：参与活动即有机会获得幸运奖，每天8次免费抽奖机会。此活动为概率中奖，奖品数量有限，祝好运！</p>
                            <p>惊喜一：价值888元支付宝现金红包</p>
                            <p>惊喜二：价值600元支付宝现金红包</p>
                            <p>惊喜三：价值88元支付宝现金红包</p>
                            <p>惊喜四：价值80元支付宝现金红包</p>
                            <p>惊喜五：神秘福袋</p>
                            <p>－－－－－－－－－－－－－－－－</p>
                            <p>重要声明：</p>
                            <p>1、实物类奖品将在活动结束后5-10个工作日安排发货，请耐心等待</p>
                            <p>2、优惠券类奖品的使用规则详见每个优惠券的介绍页</p>
                            <p>3、请兑换后仔细阅读使用流程，如有疑问，可直接联系客服专线：400-080-6659或客服QQ：4000806659（工作日9:00至18:00）</p>
                            <p>4、通过非法途径获得奖品的，主办方有权不提供奖品</p></div>
                    </div>
                    <div class="probability rule-3">
                        <div class="nav"><span>更多概率说明</span><i></i></div>
                        <div class="text">
                            <div class="probability-wrapper rule-3">
                                <div class="probability-scroller"><p>惊喜一：价值888元支付宝现金红包共10份，中奖概率为0.1%</p>
                                    <p>惊喜二：价值600元支付宝现金红包共30份，中奖概率为0.2%</p>
                                    <p>惊喜三：价值88元支付宝现金红包共50份，中奖概率为0.3%</p>
                                    <p>惊喜四：价值80元支付宝现金红包共100份，中奖概率为0.4%</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--滚动条-->
                <!--<div class="iScrollVerticalScrollbar iScrollLoneScrollbar"
                     style="position: absolute; z-index: 9999; width: 7px; bottom: 2px; top: 2px; right: 1px; overflow: hidden; pointer-events: none;">
                    <div class="iScrollIndicator"
                         style="box-sizing: border-box; position: absolute; background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.9); border-radius: 3px; width: 100%; transition-duration: 0ms; display: block; height: 393px; transform: translate(0px, 130px) translateZ(0px);"></div>
                </div>-->
            </section>
            <div class="close"></div>
        </div>
    </div>
</div>
<!--奖品弹出层-->
<div class="model model_prize">
    <div class="wrap" style="transform:scale(.1)">
        <div class="light">
        </div>
            <div class="close"></div>
            <div class="hb-template">
                <div class="back"></div>
                <div class="body">
                    <!--奖品图片-->
                    <img  src="" alt="">
                </div>
                <div class="front">
                    <p class="p1">恭喜获得</p>
                    <p class="prize"></p>
                    <a id="get_now" href="#" class="btn">立即领取</a>
                </div>
            </div>
        </div>
</div>
</body>
</html>
