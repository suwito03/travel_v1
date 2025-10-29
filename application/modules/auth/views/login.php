<style>
    
</style>


<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Aplikasi </b>TRAVEL</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>

    <?php
                        $attributes = array("class" => "login100-form validate-form");
                        echo form_open("auth/login", $attributes);
                        ?>
                         <span class="error"> <?php echo $message; ?> </span>
      <div class="form-group has-feedback">
      <input class="form-control"  id="identity" name="identity"   value="<?php echo set_value('identity'); ?>" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <input class="form-control" type="password" name="password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->