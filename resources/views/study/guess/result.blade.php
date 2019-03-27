<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>足球竞猜添加页面</title>
</head>
<body style ="width:100%;">
<div style="margin:0px auto;">
        <table style="width:27%; border:#d4d4d4 1px solid">
            <tr><td style="width:300px;text-align:center;">查看结果</td></tr>
            <tr><td style="width:300px;text-align:center;">对阵结果:
                    {{$info['tema_a']}}
                    @if($info['result']==1) 胜 @elseif($info['result']==2) 平 @else 负 @endif
                    {{$info['tema_b']}}
                </td></tr>
            @if(!empty($first))
            <tr><td style="width:300px;text-align:center;">您的竞猜1
                    {{$info['tema_a']}}
                    <font color="#ff00000">@if($first->g_result==1) 胜 @elseif($first->g_result==2) 平 @else 负 @endif</font>
                    {{$info['te_b']}}
                </td>
            </tr>
            <td>
                @if($first->g_result==$info['result'])恭喜您猜中了@else 很抱歉您没有猜中@endif
            </td>
            @else
                <td>
                    您么有竞猜
                </td>

            @endif
        </table>

</div>
</body>
</html>