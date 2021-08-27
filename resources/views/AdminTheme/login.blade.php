<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="AdminTheme/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="AdminTheme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminTheme/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b>Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            @if(Session::get('fail'))
            <script>
                swal({
                    icon: 'error',
                    title: " {{Session::get('fail')}}",
                    button: "ok!",
                });
            </script>
            @endif
            <div class="card-body login-card-body">
                <center><img src="icons/user.gif" style="height: 150px;"></center>

                <form action="{{route('check')}}" method="POST">
                    @csrf
                    @php
                    if(isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_password']))
                    {
                        $admin_email = $_COOKIE['admin_email'];
                        $admin_password = $_COOKIE['admin_password'];
                        $remeber = "checked='checked";
                    } else{

                        $admin_email = "";
                        $admin_password = "";
                        $remeber = "";
                    }
                    @endphp
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" value="{{$admin_email}}" id="email" placeholder="Email_Id">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if($errors->has('email'))
                                <span style="color: red;">{{$errors->first('email')}}</span>
                                @endif
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="pass" value="{{$admin_password}}" id="pass" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if($errors->has('pass'))
                                <span style="color: red;">{{$errors->first('pass')}}</span>
                                @endif
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-8">
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{$remeber}}>
                            <label>
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mb-3">


                        <button type="submit" class="btn btn-block btn-primary">Login</button>

                        <a href="{{route('Admin.registration')}}" class="btn btn-block btn-danger">
                            New Registration
                        </a>
                    </div>

                </form>


                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html"></a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center"></a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="AdminTheme/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="AdminTheme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminTheme/dist/js/adminlte.min.js"></script>

</body>

</html>