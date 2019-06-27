<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/ass/doLogin" method="post">
	{{csrf_field()}}
	@if(session('msg'))
	<div style="color:red;font-size:13px;margin-bottom:10px; ">{{session('msg')}}</div>
	@endif

    <input type="text" name="username" placeholder="用户名"><br>
    <input type="password" name="password" placeholder="密码"><br>
    <button>立即登录</button>
</form>
</body>
</html>