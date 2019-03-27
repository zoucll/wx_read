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
    <form  method="post" action="/study/guess/doGuess">
        {{csrf_field()}}
        <table style="width:27%; border:#d4d4d4 1px solid">
            <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$info['id']}}" name="team_id">
            <tr><td style="width:300px;text-align:center;">我要竞猜</td></tr>
            <tr><td style="width:300px;text-align:center;">{{$info['tema_a']}}VS {{$info['tema_b']}}</td></tr>
            <tr><td style="width:300px;text-align:center;">
                    <input type="radio" name="g_result" value="1">胜
                    <input type="radio" name="g_result" value="2">负
                    <input type="radio" name="g_result" value="3">平
                </td>
            </tr>
            <tr><td style="width:300px;text-align:center;"><input type="submit" value="竞猜"></td></tr>
        </table>
    </form>
</div>
</body>
</html>