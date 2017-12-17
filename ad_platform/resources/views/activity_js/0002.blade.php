/*canvas*/
$(document).ready(function(){
    init();
    function init(){
        //@todo 获取一次奖品
        $.ajax({
        url: "{{url('p')}}/{{$activity_id}}",
        headers: {
        'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        type: 'GET',
        dataType:'json',
        contentType: false,
        processData: false,
        success: function (result) {
        if(result.status==1){
        console.log(result);
        var attribute = result.data.attribute;

        $('.model_prize .body img').attr('src','/'+attribute.product_image);

        $('.model_prize .front .prize').html(result.data.activity_product_name);
        $('#get_now').attr('href',attribute.target_url);
        $('#can_con').attr('style',"background:url(/"+attribute.product_image+") no-repeat center");

        }else{

        }

        },
        error: function (returndata) {

        }
        });
    };

    var canCon = document.getElementById('can_con');
    var oCan = document.getElementById('can');//获取画布
    var oGc = oCan.getContext('2d');
    /* 画布偏移量，下面用到的时候再介绍*/
    var arr = getOffset(oCan);
    var oLeft = arr[0];
    var oTop = arr[1];
    //创建图片对象
    var img = new Image();
    img.src = '{{asset('activity/0002/images/cover.png')}}';
    /*var img = document.getElementsByTagName('imgCover');*/
    //创建一个图案对象
    img.onload = function(){
        var pat=oGc.createPattern(img,"repeat");
        oGc.beginPath();
        oGc.fillStyle = pat;
        oGc.fillRect(0,0,300,200);
        oGc.closePath();
        /* 增加触摸监听*/
    };

    oCan.addEventListener("touchstart",fn1,false);

    function fn1(){
        if($('.btn-shake').css('display') === 'none'){
            /* 初始化画笔*/
            oGc.beginPath();
            /* 画笔粗细*/
            oGc.lineCap = 'round';
            oGc.lineWidth = 30;
            oGc.lineJoin = 'round';
            /* 设置组合效果*/
            oGc.globalCompositeOperation = 'destination-out';
            /* 移动画笔原点*/
            oGc.moveTo(event.touches[0].pageX-oLeft,event.touches[0].pageY-oTop);
            document.addEventListener("touchmove",fn2);
            document.addEventListener('touchend',fn3);
        }

    };
    function fn2(){
    /* 根据手指移动画线，使之变透明*/
    console.log(222);
    oGc.lineTo(event.touches[0].pageX-oLeft,event.touches[0].pageY-oTop);
    /* 填充*/
    oGc.stroke();
    }
    function fn3() {

        $('.model_prize .close').click(function(){
        $('.model_prize').hide();
        });
        $('.model_prize').show();
        oGc.clearRect(0,0,oCan.width,oCan.height);
    //$('.model_prize .body img').attr('src','{{asset('activity/0002/images/1.jpg')}}');
    //$('.model_prize .front .prize').html('yidengjiang');

    var num = 0.1;
    var timer = setInterval(function () {
    num+=0.01;
    if (num >= 1){
    clearInterval(timer);
    $('.model_prize .light').show();
    }
    $('.model_prize .wrap')[0].style.transform = "scale("+num+")";
    },3);
    document.removeEventListener('touchstart',fn1);
    document.removeEventListener('touchmove',fn2);
    document.removeEventListener('touchend',fn3);
    }

    /* 之所以会用到下面的那个函数getOffset（obj）
    * 是因为event.touches[0].pageX、pageY获取的是相对于可视窗口的距离
    * 而lineTo画笔的定位是根据画布位置定位的
    * 所以就要先获取到画布(canvas)相对于可视窗口的距离，然后计算得出触摸点相对于画布的距离
    * */
    /* 获取该元素到可视窗口的距离*/
    function getOffset(obj){
    var valLeft = 0,valTop = 0;
    function get(obj){
    valLeft += obj.offsetLeft;
    valTop += obj.offsetTop;
    /* 不到最外层就一直调用，直到offsetParent为body*/
    if (obj.offsetParent.tagName!='BODY') {
    get(obj.offsetParent);
    }
    return [valLeft,valTop];
    }
    return get(obj);
    }
});