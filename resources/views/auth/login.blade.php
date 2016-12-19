<!DOCTYPE html>
<html>
  @section('htmlheader_title')
      Login
  @endsection

  @section('htmlheader')
    @include('admin.layout.htmlheader')
  @show

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Berkah</b>Properti</a>
      </div>
      <!-- /.login-logo -->

      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!!!</strong> Login Error.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="/login" method="post">
          {{ csrf_field() }}

          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <!-- <input type="checkbox" name="remember"> Remember Me -->
                </label>
              </div>
            </div>
            <!-- /.col -->

            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <a href="{{ url('/password/reset') }}">I forgot my password</a><br> -->

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="adminpage/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="adminpage/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="adminpage/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
