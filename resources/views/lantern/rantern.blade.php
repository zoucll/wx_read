<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>元宵十五日猜一个字 - 可乐义</title>
    <meta name="description" content="元宵十五日猜一个字" />
    <meta name="keywords" content="元宵十五日猜一个字" />
    <link type="text/css" rel="Stylesheet" href="http://keleyi.com/keleyi/phtml/jqtexiao/35/keleyitimu.css" />
    <script type="text/javascript" src="http://keleyi.com/keleyi/pmedia/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="http://keleyi.com/keleyi/phtml/jqtexiao/35/keleyitimu.js"></script>
    <style type="text/css">
        *{
            margin:0 auto;
            padding:0;
        }
        @keyframes rotate{
            0%{
                transform:rotateX(0deg) rotateY(0deg);
            }
            100%{
                transform:rotateX(360deg) rotateY(360deg);
            }
        }
        html{
            background:linear-gradient(#ff0 0%, #000 80%);
            height:100%;
        }
        .wrap{
            margin-top:200px;
            perspective: 1000px; /* 视图距元素的距离 相当于摄像机 */
        }
        .cube{
            width:200px;
            height:200px;
            position:relative;
            color:#fff;
            font-size:36px;
            font-weight:bold;
            text-align:center;
            line-height:200px;
            transform-style:preserve-3d; /* 默认flat 2D */
            transform:rotateX(-30deg) rotateY(-70deg);
            animation:rotate 20s infinite linear; /*播放时间 播放次数为循环 缓动效果为匀速 */
        }
        .cube > div{
            width:100%;
            height:100%;
            border:1px solid #fff;
            position:absolute;
            background-color:#333;
            opacity:.6;
            transition:transform 0.4s ease-in;
        }
        .cube .out-front{
            transform: translateZ(100px);
        }
        .cube .out-back{
            transform: translateZ(-100px) rotateY(180deg);
        }
        .cube .out-left{
            transform: translateX(-100px) rotateY(-90deg);
        }
        .cube .out-right{
            transform: translateX(100px) rotateY(90deg);
        }
        .cube .out-top{
            transform: translateY(-100px) rotateX(90deg);
        }
        .cube .out-bottom{
            transform: translateY(100px) rotateX(-90deg);
        }
        .cube > span{
            display:block;
            width:100px;
            height:100px;
            border:1px solid black;
            background-color:#999;
            position:absolute;
            top:50px;
            left:50px;
        }
        .cube .in-front{
            transform: translateZ(50px);
        }
        .cube .in-back{
            transform: translateZ(-50px) rotateY(180deg);
        }
        .cube .in-left{
            transform: translateX(-50px) rotateY(-90deg);
        }
        .cube .in-right{
            transform: translateX(50px) rotateY(90deg);
        }
        .cube .in-top{
            transform: translateY(-50px) rotateX(90deg);
        }
        .cube .in-bottom{
            transform: translateY(50px) rotateX(-90deg);
        }
        .wrap:hover .out-front{
            transform: translateZ(200px);
        }
        .wrap:hover .out-back{
            transform: translateZ(-200px) rotateY(180deg);
        }
        .wrap:hover .out-left{
            transform: translateX(-200px) rotateY(-90deg);
        }
        .wrap:hover .out-right{
            transform: translateX(200px) rotateY(90deg);
        }
        .wrap:hover .out-top{
            transform: translateY(-200px) rotateX(90deg);
        }
        .wrap:hover .out-bottom{
            transform: translateY(200px) rotateX(-90deg);
        }
        body,a{color:white}
    </style>
</head>
<body>
<div class="wrap">
    <div class="cube">
        <div class="out-front">5486</div>
        <div class="out-back">爱你</div>
        <div class="out-left">邹春雷</div>
        <div class="out-right">走到一起</div>
        <div class="out-top">爱你</div>
        <div class="out-bottom">走到一起</div>

        <span class="in-front"></span>
        <span cla爱你ss="in-back"></span>
        <span class="in-left"></span>
        <span class="in-right"></span>
        <span class="in-top"></span>
        <span class="in-bottom"></span>
    </div>
</div>
<table style="margin:0px auto auto auto;text-align:center">
    <div id="head_keleyi_com">
        <div id="tou_kelei_cn">元宵灯谜</div>
        <div class="clear"></div>
    </div>
    <div id="weihzi_keleyi_com"><a href="http://keleyi.com" target="_blank">首页</a> - <a href="http://keleyi.com/keleyi/phtml/">特效库</a> - <a href="http://keleyi.com/a/bjae/sn78qmtf.htm" target="_blank">原文</a></div>
    <div id="container">
        <div id="tikuang_keleyi_com">
            <div id="tigan_keleyi_com">
                @if(!empty($lanterns)==1)
                    @foreach($lanterns as $lantern)
                        <tr>
                            <td>{{$lantern['name']}}</td>
                        </tr>
                    @endforeach
                @endif
                {{--元宵十五日猜一个字？--}}
            </div>
            <div>
                <div id="huida_keleyi_com">
                    <br />在这里输入答案：<br /><input type="text" id="daan_keleyi_com" onkeydown="return jpdati(event);" style="width:300px;" />
                    <br />
                    <div id="tips_keleyi_com">　</div>
                    <input type="button" value="答题" onclick="dati()" class="answerbutton" />
                    <div><a href="http://www.keleyi.cn/yzdd/20130221/yhxl4wjq.htm">上一题</a>　<a href="http://www.keleyi.cn/yzdd/20120309/cls3we69.htm">下一题</a>　<a href="javascript:;" id="qingkong">清空</a>　<a href="javascript:kandaan()">查看答案</a></div>
                    <div id="daan_div" style="visibility:hidden">参考答案：<span id="dana_keleyi">廿</span></div>
                </div>
                <div id="zaiyiqi"></div>
            </div>
            <div>
            </div>
        </div>
        <div id="right_keleyi_com"></div>
    </div>
</table>
</body>
</html>