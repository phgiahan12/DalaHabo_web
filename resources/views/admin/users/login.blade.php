
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>DalaHabo</b></a>
        </div>
        
        <div class="card-body">
            <p class="login-box-msg"><b>Đăng nhập</b></p>

            @include('admin.alert')

            <form action="../../../public/admin/users/login/store" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Nhớ mật khẩu
                            </label>
                        </div>
                    </div>
                    
                    <!-- /.col -->
                    <!-- <div class="col-5">
                        <button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
                    </div> -->
                    <!-- /.col -->
                </div>
                <div class="text-center mt-2 mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
                </div>
                @csrf
            </form>

            

            <!-- <div class="social-auth-links text-center mt-2 mb-3">
                <p>- HOẶC -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Đăng nhập với Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Đăng nhập với Google+
                </a>
            </div> -->
            <!-- /.social-auth-links -->

            <p class="mb-1 text-center">
                <a href="forgot-password.html">Quên mật khẩu</a>
            </p>
            <!-- <p class="mb-0">
                <a href="register.html" class="text-center">Đăng kí</a>
            </p> -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
    @include('admin.footer')
</body>
</html>
