<body class="hold-transition register-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><b>Login</b> Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("login");?>
      <div class="form-group has-feedback">
        <?php echo form_input($identity);?>        
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_input($password);?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label for="remember">
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>  Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <?php echo form_submit('submit', 'Sign In', "class='btn btn-primary btn-block btn-flat'"); ?>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close();?>

    <a href="<?php echo base_url('forgot_password');?>"><?php echo lang('login_forgot_password');?></a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->