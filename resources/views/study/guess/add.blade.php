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
        <form  method="post" action="/study/guess/doAdd">
            {{csrf_field()}}
        <table style="width:27%; border:#d4d4d4 1px solid">
            <tr><td style="width:300px;text-align:center;">添加精彩球队</td></tr>
            <tr><td style="width:300px;text-align:center;"><input type="text" name="tema_a">VS <input type="text" name="tema_b"></td></tr>
            <tr><td style="width:300px;text-align:center;">竞猜结束时间 <br><input type="text" name="end_at"></td></tr>
            <tr><td style="width:300px;text-align:center;"><input type="submit" value="添加"></td></tr>
        </table>
        </form>
    </div>
</body>
</html>