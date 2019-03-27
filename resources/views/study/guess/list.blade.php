<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>足球竞猜列表页面</title>
</head>
<body>
    <table style="width:300px;">
        <tr style="text-align:center;"><td>球队</td><td>操作</td></tr>
        <tbody style="text-align:center;">
        @if(!empty($list))
        @foreach($list as $key=>$value)
        <tr style="heignt:35px;line-height:35px;"><td>{{$value['tema_a']}} VS {{$value['tema_b']}}</td>
            <td>
            @if(strtotime($value['end_at'])> time())
                    <a href="/study/guess/guess?id={{$value['id']}}&user_id={{$user_id}}">竞猜</a>
            @else
                    <a href="/study/guess/result?id={{$value['id']}}&user_id={{$user_id}}">查看结果</a>
            @endif
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</body>
</html>