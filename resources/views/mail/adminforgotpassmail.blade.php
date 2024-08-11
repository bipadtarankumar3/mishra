<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p> Click to chenge your password</p>
   @if($type == "ADMIN")
		<a href="{{URL::to('confirmPasswordPage/'.$getData)}}" target="_blank">forgot Your Password</a>
    @else
    	<a href="{{URL::to('confirmPasswordPage/'.$getData)}}" target="_blank">forgot Your Password</a>
    @endif
</body>
</html>
