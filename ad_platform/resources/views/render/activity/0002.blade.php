@extends('render.activity.layout')
@section('jsimport')

<script type="text/javascript" src="{{asset('activity/0002/js/fontSize_p.js')}}"></script>
<script type="text/javascript" src="{{asset('activity/0002/js/jquery.1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('activity/0002/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('activity/0002/js/index.js')}}"></script>


<link rel="stylesheet" href="{{asset('activity/0002/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('activity/0002/css/swiper.min.css')}}">
<script type="text/javascript" src="/activityjs/2/js"></script>

@stop

@section('content')
    <body>
    <img src="{{asset('activity/0002/images/cover.png')}}" alt="" id="imgCover" style="display: none;">
    <div class="wrap">
        <div class="rule_btn"></div>
        <a class="myprize_btn" href="/myprice/"></a>
        <div class="head">
            <div class="can_container">
                <div id="can_con">
                    <div class="animated tada infinite btn-shake">开始刮奖</div>
                    <canvas id="can"></canvas>
                </div>
            </div>
        </div>
        <!--滑动红包-->
        <div class="swiper-tit"></div>
        <div class="swiper-container hongbao_list">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <p ><img src="{{asset('activity/0002/images/hongbao.png')}}" alt=""></p>
                    <p>100元红包</p>
                </div>
                <div class="swiper-slide"><p><img src="{{asset('activity/0002/images/hongbao.png')}}" alt=""></p>
                    <p>100元红包</p></div>
                <div class="swiper-slide"><p><img src="{{asset('activity/0002/images/hongbao.png')}}" alt=""></p>
                    <p>100元红包</p></div>
                <div class="swiper-slide"><p><img src="{{asset('activity/0002/images/hongbao.png')}}" alt=""></p>
                    <p>100元红包</p></div>
                <div class="swiper-slide"><p><img src="{{asset('activity/0002/images/hongbao.png')}}" alt=""></p>
                    <p>100元红包</p></div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <div class="fixed">*奖品与活动和设备生产商Apple Inc.公司无关</div>
    <!--规则-->
    <div class="rule-model">
        <div class="wrap">
            <div class="rule-container">
                <a class="close" href="javascript:void(0);"></a>
                <div class="container">
                    <div class="text-wrap">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p>9要发，9月财运大爆炸！这波红包包你满意，领到手抽软~</p><p>活动说明：参与活动即有机会获得幸运奖，每天8次免费抽奖机会。此活动为概率中奖，奖品数量有限，祝好运。</p><p>惊喜一：599元红包</p><p>惊喜二：299元红包</p><p>惊喜三：99元红包</p><p>惊喜四：9元红包</p><p>惊喜五：幸运奖</p><p>－－－－－－－－－－－－－－－－</p><p>重要声明</p><p>1、实物类奖品将在活动结束后5-10个工作日安排发货，请耐心等待</p><p>2、优惠券类奖品的使用规则详见每个优惠券的介绍页</p><p>3、请兑换后仔细阅读使用流程，如有疑问，可直接联系客服专线：400-080-6659或客服QQ：4000806659（工作日9:00至18:00）</p><p>4、通过非法途径获得奖品的，主办方有权不提供奖品</p>
                                <div class="nav"><span>更多概率说明</span><i></i></div>
                                <div class="text">
                                    <div class="probability-wrapper rule-3">
                                        <div class="probability-scroller"><ul><li>599元红包共3份，中奖概率0.01%</li><li>299元红包共6份，中奖概率0.02%</li><li>99元红包共20份，中奖概率0.06%</li><li>9元红包共100份，中奖概率0.3%</li></ul></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    红包弹出层
    -->
    <div class="hongbao_model">
        <!--swiper1-->
        <div class="hongbao_model_container">
            <div class="hongbao_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="head_img" src="{{asset('activity/0002/images/hongbao_model_img.jpg')}}" alt="">
                        <p class="sum">299红包</p>
                        <div class="tit">【商品详情】</div>
                        <p class="des">商品名称：599元支付宝红包</p>
                        <div class="tit">【领取说明】</div>
                        <p class="des">获奖后，请详细填写个人手机号（将作为支付宝充值号码）、姓名（核对用户），我们会在5-10个工作日内为您充值，若因个人原因导致号码错误、误充错充，不会进行补充，敬请谅解</p>
                        <div class="tit">【特别说明】</div>
                        <p class="des"> 请仔细阅读领奖流程，若有疑问，可直接联系客服专线：400-080-6659或客服QQ：4000806659（工作日9:00至18:00）</p>
                    </div>
                </div>
                <div class="swiper-scrollbar1"></div>
            </div>

        </div>
        <div class="close">收起</div>
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
                    <img src="" alt="">
                </div>
                <div class="front">
                    <p class="p1">恭喜获得</p>
                    <p class="prize"></p>
                    <a id="get_now" href="#" style="color: #e22820;" class="btn">立即领取</a>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    </body>
@stop


@section('css')
<style>
    body,ul,ol,li,p,h1,h2,h3,h4,h5,h6,form,fieldset,table,td,img,div{margin:0;padding:0;border:0;}
    body{color:#333; font-size:12px;font-family:"Microsoft YaHei";background-color: #459dff;}
    ul,ol{list-style-type:none;}
    select,input,img,select{vertical-align:middle;}
    input{ font-size:12px;}
    a{ text-decoration:none; color:#000;}
    a:hover{color:#c00; text-decoration:none;}
    .clear{clear:both;}
    .wrap{
        position: relative;
        width: 6.4rem;
        margin: 0 auto;
    }
    .head{
        height:6.88rem ;
        background: url("{{asset('activity/0002/images/banner_bg.png')}}") no-repeat center;
        background-size: contain;
        overflow: hidden;
    }
    .can_container{
        width: 5.82rem;
        height: 3.92rem;
        margin: 2.8rem auto;
        background: url("{{asset('activity/0002/images/wenli.png')}}") no-repeat center;
        background-size: contain;
        overflow: hidden;
    }
    #can_con{
        width: 5.52rem;
        height: 3.38rem;
        margin: .26rem auto;
        background-size: contain;
    }
    .btn-shake{
        position: absolute;
        top:50%;
        left: 50%;
        width: 2.6rem;
        margin-left: -1.3rem;
        margin-top:-.3rem ;
        height: .6rem;
        line-height: .6rem;
        text-align: center;
        background: #ffbf13;
        color: #fff;
        font-size: .3rem;
        border-radius: .05rem;

    }
    #can{
        display: block;
        width: 5.52rem;
        height: 3.38rem;
        margin: .26rem auto;
    }
    .swiper-tit{
        height: .5rem;
        background: url("{{asset('activity/0002/images/tit_bg.png')}}") no-repeat #e14a4a center;
        background-size: contain;
    }
    .swiper-container{
        background-color:#e14a4a;
        height: 2.10rem;
        padding-top: .3rem;
        padding-left: .3rem;
        -webkit-box-sizing: padding-box;
        -moz-box-sizing: padding-box;
        box-sizing: padding-box;
    }
    .swiper-container .swiper-slide{
        width: 1.35rem;
        height: 1.71rem;
        margin-left: .2rem;
    }
    .swiper-container .swiper-slide p:nth-child(1){
        width:1.35rem ;
        height: 1.35rem;
        border: .04rem solid #fee07f;
        border-radius: 5px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background-color: #fff;
        text-align: center;

    }
    .swiper-container .swiper-slide p img{
        width: 1rem;
        height: 1rem;
        margin-top: 0.12rem;
    }
    .swiper-container .swiper-slide p:nth-child(2){
        width:1.35rem ;
        text-align: center;
        font-size: .2rem;
        color: #fff;
        padding: .05rem 0;
    }
    .fixed{
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 999;
        width: 100%;
        height: .4rem;
        text-align: center;
        background-color: #3c93f3;
        color: #fff;
        line-height: .4rem;
        font-size: .2rem;
    }
    .rule_btn{
        position: absolute;
        left: .4rem;
        top:.2rem;
        width:.92rem;
        height: .37rem;
        background: url('{{asset('activity/0002/images/rule_icon.png')}}') no-repeat center;
        background-size: contain;
    }
    .myprize_btn{
        position: absolute;
        right: 0;
        top:0;
        width:1.08rem;
        height: 1.08rem;
        background: url('{{asset('activity/0002/images/myprize_icon.png')}}') no-repeat center;
        background-size: contain;
    }
    /*规则弹出层*/
    .rule-model{
        display: none;
        position: fixed;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.75);
        z-index: 1000;
    }
    .rule-container{
        width: 5.78rem;
        height: 7.59rem;
        background: url("{{asset('activity/0002/images/rule_bg.png')}}") no-repeat center;
        background-size: contain;
        margin: 1rem auto;
        overflow: hidden;
    }
    .rule-container .container{
        width: 4rem;
        height: 4.6rem;
        position: relative;
        margin: 2.4rem auto;
        font-size: .2rem;
        overflow: hidden;
    }
    .text-wrap{
        width: 100%;
        height: 100%;
    }
    .text-wrap .swiper-slide{
        height: auto;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: .2rem;
    }
    .text-wrap .swiper-slide p{
        color: #fff;
    }
    .text-wrap .nav{

        display: block;
        padding-right: .2rem;
        position: relative;
        overflow: hidden;
        height: .62rem;
        cursor: pointer;
        border-radius: .04rem .04rem 0 0;
        background-color: #9d5627;
        background: 0 0;
        line-height: .62rem;
    }
    .text-wrap .nav i{
        display: inline-block;
        width: .12rem;
        height: .12rem;
        transition: all .3s ease-in-out;
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
        -webkit-transform-origin: .03rem .03rem;
        transform-origin: .03rem .03rem;
        vertical-align: -.04rem;
        border: .02rem solid transparent;
        border-left-color: #893d0f;
        border-top-color: #893d0f;
        margin-left: .2rem;

    }

    .text-wrap .text{
        font-size: .1rem;
        line-height: 1.4285;
        display: none;
        padding-top: .1rem;
        text-align: justify;
        color: #8c160d;
    }
    .close{
        width: .5rem;
        height: .5rem;
        position: absolute;
        top: 0;
        left: 46%;
        /* background-color: rgba(255,255,255,.5);*/
    }
    /*红包弹出层*/
    .hongbao_model{
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top:0;
        width: 100%;
        height: 100%;
        background-color: rgba(100,100,100,.5);
    }
    .hongbao_model_container{
        display: none;
        margin: 0 auto;
        width: 6.4rem;
        height: 70%;
        background: #fff;
        border-radius: .05rem;
        position: relative;
        overflow: hidden;
    }
    .hongbao_swiper{
        width: 100%;
        height: 90%;
    }
    .hongbao_model_container .swiper-slide{
        height: auto;
    }
    .hongbao_model_container .head_img{
        width: 100%;
    }
    .hongbao_model_container .sum{
        font-size: .32rem;
        padding-left: .2rem;
        padding-bottom: .2rem;
        border-bottom: 1px solid #ddd;
    }
    .hongbao_model_container .tit{
        line-height: .6rem;
        font-size: .24rem;
        padding-left: .2rem;
    }
    .hongbao_model_container .des{
        font-size: .24rem;
        padding:0  .4rem;
        line-height: .3rem;
        padding-bottom: .3rem;
    }
    .hongbao_model .close{
        position: absolute;
        top: 7.5rem;
        left: 50%;
        margin-left:-.4rem;
        width: .8rem;
        height: .8rem;
        background: rgba(255,100,0,.7);
        color: #fff;
        border-radius: 50%;
        text-align: center;
        line-height: .8rem;
        z-index: 10;
        font-size: .2rem;
    }
    /*弹出红包*/
    .model{
        display: none;
        position: fixed;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 1000;
    }
    .model .close{
        position: absolute;
        top:-.5rem;
        right: .5rem;
        width:.5rem ;
        height: .5rem;
        background: url("{{asset('activity/0002/images/close.png')}}") no-repeat;
        background-size: contain;
    }
    .model_prize .light{
        display: none;
        position: absolute;
        top:-1.7rem;
        left: -.64rem;
        width: 7.5rem;
        height: 7.5rem;
        background: url("{{asset('activity/0002/images/light.png')}}") no-repeat top center;
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
        background:url("{{asset('activity/0002/images/redpacks.png')}}") no-repeat ;
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
        background: url("{{asset('activity/0002/images/bg-back.png')}}") no-repeat;
        background-size: contain;
    }
    .hb-template .body{
        position: absolute;
        top:.6rem;
        left:.71rem ;
        width: 4.58rem;
        height: 3.53rem;
        background: url("{{asset('activity/0002/images/body.png')}}") no-repeat;
        background-size: contain;
    }
    .hb-template .body img{
        position: absolute;
        bottom: .4rem;
        left: .2rem;
        width: 92%;
        height: 2rem;
    }
    .hb-template .front{
        position: absolute;
        bottom:0;
        left:.2rem ;
        width: 5.60rem;
        height: 3.84rem;
        background: url("{{asset('activity/0002/images/bg-front-low.png')}}") no-repeat;
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
        background: url("{{asset('activity/0002/images/button.png')}}") no-repeat;
        background-size: contain;
        margin: .4rem auto;
    }
</style>
@stop