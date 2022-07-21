<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="{{asset('dist/bootstrap/css/bootstrap.min.css')}}">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/et-line-font/et-line-font.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/themify-icons/themify-icons.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign In</h3>
    @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" name="email" :value="old('email')" placeholder="User">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" name="password" placeholder="Password">
      </div>
      <div>
        <div class="col-xs-8">
        @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat" > Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="m-t-2">Don't have an account? <a href="./register" class="text-center">Sign Up</a></div>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="{{asset('dist/js/jquery.min.js')}}"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="{{asset('dist/bootstrap/js/bootstrap.min.js')}}"></script> 

<!-- template --> 
<script src="{{asset('dist/js/niche.js')}}"></script>
</body>
</html>




