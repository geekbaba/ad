@extends('render.activity.layout')
@section('jsimport')
    <script type="text/javascript" src="{{asset('activity/0001/js/jquery-1.10.2.js')}}"></script>
    <script type="text/javascript" src="{{asset('activity/0001/js/awardRotate.js')}}"></script>
    <script type="text/javascript" src="{{asset('activity/0001/js/fontSize.js')}}"></script>
    <script type="text/javascript" src="/activityjs/1/js"></script>
@stop

@section('content')
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
    <a class="myprize_btn" href="/myprice/"></a>
    <div class="banner">
        <div class="header">

        </div>
        <div class="turnplate" style="background-image:url(/{{$main_background_image}});background-size:100% 100%;">
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
@stop


@section('css')
<style>
    body,ul,ol,li,p,h1,h2,h3,h4,h5,h6,form,fieldset,table,td,img,div{margin:0;padding:0;border:0;}
    body{color:#333; font-size:12px;font-family:"Microsoft YaHei"}
    ul,ol{list-style-type:none;}
    select,input,img,select{vertical-align:middle;}
    input{ font-size:12px;}
    a{ text-decoration:none; color:#000;}
    a:hover{color:#c00; text-decoration:none;}
    .clear{clear:both;}
    .wrap{
        width: 7.5rem;
        margin: 0 auto;
        position: relative;
    }
    /* 大转盘样式 */
    .banner{display:block;width:100%;height:12.06rem;margin-left:auto;margin-right:auto;margin-bottom: 20px;background: url("{{asset('activity/0001/images/bg.jpg')}}")no-repeat;background-size: contain;overflow: hidden;}
    .banner .turnplate{display:block;width:90%;position:relative;margin-top: 20%;margin-left: auto;margin-right: auto;}
    .banner .turnplate canvas.item{width:100%;}
    .banner .turnplate img.pointer{position:absolute;width:31.5%;height:42.5%;left:34.6%;top:23%;}
    /*头部样式*/
    .header{
        height:2.58rem;
        background:url(/{{$banner_image}}) no-repeat;
        background-size: contain;
    }
    /*弹出层样式*/
    .model{
        display: none;
        position: fixed;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
    }
    .model .close{
        position: absolute;
        top:-.5rem;
        right: .5rem;
        width:.5rem ;
        height: .5rem;
        background: url("{{asset('activity/0001/images/close.png')}}") no-repeat;
        background-size: contain;
    }
    .model_prize .light{
        display: none;
        position: absolute;
        top:-1.7rem;
        left: 0;
        width: 7.5rem;
        height: 7.5rem;
        background: url("{{asset('activity/0001/images/light.png')}}") no-repeat top center;
        background-size: contain;
        animation: myRotate 6s linear infinite;
    }
    @keyframes myRotate{
        0%{
            transform: rotateZ(0deg);
        }
        100%{
            transform: rotateZ(360deg);
        }
    }
    .model_prize .wrap{
        background:url("{{asset('activity/0001/images/redpacks.png')}}") no-repeat ;
        background-size: contain;
    }
    .model .hb-template{
        width: 6rem;
        height: 7rem;
        margin: 2rem auto;
        position: relative;
    }
    @media screen and (min-width: 1026px){
        .model .hb-template{
            width: 6rem;
            height: 7rem;
            margin: .2rem auto;
            position: relative;
        }
    }
    .hb-template .back{
        position: absolute;
        bottom: 0;
        left: .2rem;
        width: 5.6rem;
        height: 4.34rem;
        background: url("{{asset('activity/0001/images/bg-back.png')}}") no-repeat;
        background-size: contain;
    }
    .hb-template .body{
        position: absolute;
        top:.6rem;
        left:.71rem ;
        width: 4.58rem;
        height: 3.53rem;
        background: url("{{asset('activity/0001/images/body.png')}}") no-repeat;
        background-size: contain;
    }
    .hb-template .body img{
        position: absolute;
        bottom: .4rem;
        left: .1rem;
        width: 4.4rem;
        height: 2rem;
    }
    .hb-template .front{
        position: absolute;
        bottom:0;
        left:.2rem ;
        width: 5.60rem;
        height: 3.84rem;
        background: url("{{asset('activity/0001/images/bg-front-low.png')}}") no-repeat;
        background-size: contain;
    }
    .hb-template .front .p1{
        font-size: .4rem;
        text-align: center;
        color: #ffbf13;
        margin-top: .6rem;
    }
    .hb-template .front .prize{
        font-size: .6rem;
        text-align: center;
        color: #fff;
        margin-top: .1rem;
    }
    .hb-template .front .btn{
        display: block;
        line-height:.8rem;
        font-size: .5rem;
        text-align: center;
        width:5.06rem ;
        height: 1.02rem;
        background: url("{{asset('activity/0001/images/button.png')}}") no-repeat;
        background-size: contain;
        margin: .4rem auto;
    }
    /*规则*/
    .rule_btn{
        position: absolute;
        top:0;
        left: .2rem;
        width:.6rem ;
        height: .7rem;
        background: url("{{asset('activity/0001/images/rule.png')}}") no-repeat;
        background-size: contain;
    }
    .model_rule{
        display: none;
    }
    .rule-modal-dialog{
        position: relative;
        background: #ffbf13;
        margin: 30% auto;
        border-radius: .2rem;
        overflow: hidden;
        width: 5.6rem;
        height: 6.6rem;
        padding: .2rem .2rem;
        -webkit-box-sizing: padding-box;
        -moz-box-sizing: padding-box;
        box-sizing: padding-box;
        color: #fff;
    }
    @media screen and (min-width: 1025px){
        .rule-modal-dialog{
            margin: 0 auto;
        }
    }
    .rule-modal-dialog header{
        font-size: .3rem;
        color: #fff;
        line-height:.3rem;
        text-align: center;
        margin-bottom: .25rem;
    }
    .rule-modal-dialog header i{
        display: inline-block;
        width: .15rem;
        height: .15rem;
        background: #fff;
        border-radius: 50%;
        margin: 0 .1rem;
    }
    .rule-modal-dialog .close{
        position: absolute;
        top: .24rem;
        right: .24rem;
        width: .30rem;
        height: .30rem;
        cursor: pointer;
        text-align: center;
        font-size: .30rem;
    }
    .scroll-box{
        width: 100%;
        height: 5.5rem;
        overflow: auto;
    }
    .rule-modal .iScrollVerticalScrollbar {
        right: 0!important;
        width: .1rem!important;}
    .rule-modal-dialog p{
        margin-bottom: .1rem;
        font-size: .2rem;
    }
    .probability .nav{
        background: #ff9000;
        text-align: center;
        line-height: .4rem;
        font-size: .2rem;
    }
    .probability .nav i{
        display: inline-block;
        width: .12rem;
        height: .12rem;
        transition: all .3s ease-in-out;
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
        -webkit-transform-origin: .03rem .03rem;
        transform-origin: .03rem .03rem;
        vertical-align: -.04rem;
        border: .01rem solid transparent;
        border-top-color: #f7d1a5;
        border-left-color: #f7d1a5;
        margin: 0 .1rem;
    }
    .probability .nav i{
        border-top-color: #fff;
        border-left-color: #fff;
    }
    .probability .text{
        display: none;
    }
    /*我的奖品*/
    .myprize_btn{
        position: absolute;
        top:0;
        right: .2rem;
        width:.6rem ;
        height: .7rem;
        background: url("{{asset('activity/0001/images/prize.png')}}") no-repeat;
        background-size: contain;
    }
</style>
@stop