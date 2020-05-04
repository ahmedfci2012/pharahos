<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>elfara3na</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <link rel='stylesheet' href='{{asset("bootstrap/css/bootstrap.min.css")}}'>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->

  <link rel='stylesheet' href='{{asset("dist/css/AdminLTE.min.css")}}'>

  <!-- iCheck -->
  <link rel='stylesheet' href='{{asset("plugins/iCheck/square/blue.css")}}'>

</head>
<body class="hold-transition" 
style="height:1px;background: linear-gradient(145deg, rgb( 220,215,213) , rgb(10, 100, 100));
">
<div class="login-box" style="border-radious:50%">
  <div class="login-logo">
    <a href="#"><b>الفراعنة</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">ELFARA3NA</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input id="email" type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل </button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script type='text/javascript' src='{{asset("plugins/jQuery/jquery-2.2.3.min.js")}}'></script>


<!-- Bootstrap 3.3.6 -->
<script type='text/javascript' src='{{asset("bootstrap/js/bootstrap.min.js")}}'></script>

<!-- iCheck -->
<script type='text/javascript' src='{{asset("plugins/iCheck/icheck.min.js")}}'></script>

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