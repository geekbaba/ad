<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="AD">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
	<meta name="_token" content="{{ csrf_token() }}">
    <title>AD</title>
    <!-- Icons -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-2">
                    	<form class="login-form" action="/login/post" method="post">
                        <div class="card-block">
                        	{{ csrf_field() }}
                        	<h1>请登录</h1>
                        	@if (session('msg'))
					       	<p class="text-muted">{{session('msg')}}</p>
					        @else
					        <p class="text-muted">请登录您的账户!</p>
					        @endif
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input name="username" type="text" class="form-control" placeholder="Username"/>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input name="password" type="password" class="form-control" placeholder="Password"/>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-2">登录</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">忘记密码?</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>注册</h2>
                                <p></p>
                                <button type="button" class="btn btn-primary active mt-1">注册!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins
    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/tether/dist/js/tether.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
 -->
</body>

</html>